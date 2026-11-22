<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\MaintenancePlan;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Services\Seo\SeoData;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function about(): Response
    {
        $seo = new SeoData(
            title: 'About Us | KUIT LIMITED — Marine, Construction & Engineering',
            description: 'KUIT LIMITED (RC 806865), incorporated on 16 March 2009. Specialising in marine services, heavy equipment leasing, civil engineering, oil & gas support, and IT solutions.',
            breadcrumbs: [
                'Home' => url('/'),
                'About Us' => url('/about'),
            ]
        );

        return Inertia::render('About', [
            'seo' => $seo->toArray(),
        ]);
    }

    public function equipment(): Response
    {
        $seo = new SeoData(
            title: 'Equipment & Fleet Leasing | KUIT LIMITED',
            description: 'Heavy equipment leasing and marine fleet charter across Nigeria: CAT 330/320 excavators, bulldozers, low-bed trailers, cranes, tugs and supply vessels.',
            breadcrumbs: [
                'Home' => url('/'),
                'Equipment & Fleet' => url('/equipment'),
            ]
        );

        return Inertia::render('Equipment/Index', [
            'seo' => $seo->toArray(),
        ]);
    }

    public function contact(): Response
    {
        $seo = new SeoData(
            title: 'Contact Us | KUIT LIMITED — Effurun-Warri, Delta State',
            description: 'Contact KUIT LIMITED at 132, Airport Road, Effurun-Warri, Delta State, Nigeria. Telephone: (+234) 803 280 2038, (+234) 703 344 2821. Email: info@kuitltd.com.',
            breadcrumbs: [
                'Home' => url('/'),
                'Contact Us' => url('/contact'),
            ]
        );

        return Inertia::render('Contact', [
            'seo' => $seo->toArray(),
        ]);
    }

    public function submitContact(Request $request): RedirectResponse
    {
        // Honeypot spam trap
        if ($request->filled('b_field') || $request->filled('website')) {
            return redirect()->back()->with('success', 'Thank you! Your message has been received.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'company' => 'nullable|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:120',
            'service_interest' => 'nullable|string|max:150',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        $subjectPrefix = '';
        if (!empty($validated['service_interest'])) {
            $subjectPrefix = '[' . $validated['service_interest'] . '] ';
        }
        if (!empty($validated['company'])) {
            $subjectPrefix .= '(' . $validated['company'] . ') ';
        }

        $fullSubject = $subjectPrefix . ($validated['subject'] ?? 'Website Service Enquiry');

        $phone = function_exists('normalize_nigerian_phone')
            ? normalize_nigerian_phone($validated['phone'])
            : $validated['phone'];

        ContactMessage::create([
            'name' => $validated['name'],
            'phone' => $phone,
            'email' => $validated['email'],
            'subject' => substr($fullSubject, 0, 150),
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Thank you! Your message has been received by KUIT LIMITED. Our operations team will respond promptly.');
    }

    public function faq(): Response
    {
        $faqs = Faq::published()->orderBy('sort_order')->get();

        $seo = new SeoData(
            title: 'Frequently Asked Questions | KUIT LIMITED',
            description: 'Answers to frequently asked questions about equipment leasing terms, dry vs wet lease, marine vessel charters, civil works, and oilfield services.',
            breadcrumbs: [
                'Home' => url('/'),
                'FAQs' => url('/faq'),
            ]
        );

        return Inertia::render('FAQ', [
            'faqs' => $faqs,
            'seo' => $seo->toArray(),
        ]);
    }

    public function maintenancePlans(): Response
    {
        $plans = MaintenancePlan::where('is_active', true)->orderBy('sort_order')->get();

        $seo = new SeoData(
            title: 'Equipment & Industrial Maintenance SLAs | KUIT LIMITED',
            description: 'Protect your operations with structured Service Level Agreements (SLAs) for heavy plant, wellhead surface safety facilities, marine support, and enterprise IT in Nigeria.',
            breadcrumbs: [
                'Home' => url('/'),
                'Maintenance SLAs' => url('/maintenance-plans'),
            ]
        );

        return Inertia::render('MaintenancePlans/Index', [
            'plans' => $plans,
            'seo' => $seo->toArray(),
        ]);
    }

    public function legal(string $slug): Response
    {
        $pages = [
            'privacy-policy' => [
                'title' => 'Privacy Policy',
                'description' => 'Our data handling practices in compliance with the Nigeria Data Protection Act (NDPA) 2023.',
            ],
            'terms' => [
                'title' => 'Terms of Service',
                'description' => 'Terms and conditions governing equipment supply, warranties, and technician service delivery.',
            ],
            'warranty' => [
                'title' => 'Warranty & Quality Guarantee',
                'description' => 'Details on our multi-year equipment warranties and certified workmanship guarantees.',
            ],
            'refund-policy' => [
                'title' => 'Refund & Cancellation Policy',
                'description' => 'Transparent policies regarding order cancellations, returns, and service refunds.',
            ],
        ];

        $page = $pages[$slug] ?? abort(404);

        $seo = new SeoData(
            title: $page['title'],
            description: $page['description'],
            breadcrumbs: [
                'Home' => url('/'),
                $page['title'] => url("/{$slug}"),
            ]
        );

        return Inertia::render('Legal/Show', [
            'pageSlug' => $slug,
            'pageTitle' => $page['title'],
            'seo' => $seo->toArray(),
        ]);
    }
}
