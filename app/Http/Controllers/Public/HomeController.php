<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Product;
use App\Models\Project;
use App\Models\Faq;
use App\Models\Testimony;
use App\Models\Partner;
use App\Models\State;
use App\Services\Seo\SeoData;
use App\Services\Seo\JsonLdBuilder;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $categories = ServiceCategory::with(['services' => function ($q) {
            $q->published()->select('id', 'category_id', 'name', 'slug', 'summary', 'icon');
        }])->orderBy('sort_order')->get();

        $featuredServices = Service::published()
            ->featured()
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $featuredProducts = Product::published()
            ->featured()
            ->with(['category', 'inclusions'])
            ->take(6)
            ->get();

        $featuredProjects = Project::published()
            ->featured()
            ->with(['service', 'state', 'videos'])
            ->take(4)
            ->get();

        $testimonials = Testimony::where('status', 'approved')
            ->take(6)
            ->get(['id', 'name', 'occupation', 'rating', 'message']);

        $faqs = Faq::published()
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $stateQuery = State::where('is_active', true)
            ->whereIn('code', ['DE', 'LA', 'FC', 'RI', 'ED', 'OG']);

        if (\Illuminate\Support\Facades\DB::getDriverName() === 'sqlite') {
            $keyStates = $stateQuery->orderBy('name')->get(['id', 'name', 'code', 'delivery_fee', 'install_fee']);
        } else {
            $keyStates = $stateQuery->orderByRaw("FIELD(code, 'DE', 'LA', 'FC', 'RI', 'ED', 'OG')")
                ->get(['id', 'name', 'code', 'delivery_fee', 'install_fee']);
        }

        $partners = Partner::where('status', 'active')
            ->orderBy('sort_order')
            ->take(12)
            ->get(['id', 'name', 'logo_url', 'website_url', 'description']);

        $seo = new SeoData(
            title: 'KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria',
            description: 'KUIT LIMITED (RC 806865) delivers heavy equipment leasing, marine vessel charter, civil engineering, oil & gas technical support, and IT solutions across Nigeria.',
            jsonLd: [
                JsonLdBuilder::organization(),
                JsonLdBuilder::localBusiness(),
            ]
        );

        return Inertia::render('Home', [
            'heroSlides' => json_decode(\App\Models\Setting::get('hero_slides', '[]'), true) ?: [],
            'categories' => $categories,
            'featuredServices' => $featuredServices,
            'featuredProducts' => $featuredProducts,
            'featuredProjects' => $featuredProjects,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'keyStates' => $keyStates,
            'partners' => $partners,
            'seo' => $seo->toArray(),
        ]);
    }
}
