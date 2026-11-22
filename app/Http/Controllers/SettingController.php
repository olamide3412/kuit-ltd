<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Show settings panel (Admin Only).
     */
    public function index()
    {
        $heroSlides = json_decode(Setting::get('hero_slides', '[]'), true);
        $cleaned = false;
        if (is_array($heroSlides)) {
            foreach ($heroSlides as &$slide) {
                if (isset($slide['value'])) {
                    // Normalize absolute localhost paths to root-relative paths
                    if (str_starts_with($slide['value'], 'http://localhost/storage/')) {
                        $slide['value'] = str_replace('http://localhost/storage/', '/storage/', $slide['value']);
                        $cleaned = true;
                    } elseif (str_starts_with($slide['value'], 'http://127.0.0.1:8000/storage/')) {
                        $slide['value'] = str_replace('http://127.0.0.1:8000/storage/', '/storage/', $slide['value']);
                        $cleaned = true;
                    }
                }
            }
            if ($cleaned) {
                Setting::set('hero_slides', json_encode($heroSlides));
            }
        }

        return Inertia::render('Auth/Settings', [
            'settings' => [
                'enable_company_profile_download' => filter_var(Setting::get('enable_company_profile_download', 'true'), FILTER_VALIDATE_BOOLEAN),
                'company_profile_url' => Setting::get('company_profile_url', '/docs/kuit-limited-company-profile.pdf') ?: '/docs/kuit-limited-company-profile.pdf',
                'hero_slides' => $heroSlides,
                'company_name' => Setting::get('company_name', 'KUIT LIMITED'),
                'phone' => Setting::get('phone', '(+234) 803 280 2038'),
                'whatsapp' => Setting::get('whatsapp', '+2348032802038'),
                'email' => Setting::get('email', 'info@kuitltd.com'),
                'address' => Setting::get('address', '132 Airport Road, Effurun-Warri, Delta State, Nigeria'),
                'about_mission' => Setting::get('about_mission', '<p>To deliver world-class marine logistics, construction machinery leasing, and engineering solutions to Nigeria\'s energy and infrastructure sectors through technical precision and safety leadership.</p>'),
                'about_vision' => Setting::get('about_vision', '<p>To be the premier multi-disciplinary marine and engineering contractor in the Niger Delta and across Nigeria.</p>'),
                'about_founder_name' => Setting::get('about_founder_name', 'Executive Leadership'),
                'about_founder_title' => Setting::get('about_founder_title', 'Board of Directors, KUIT LIMITED'),
                'about_founder_bio'   => Setting::get('about_founder_bio', '<p>Incorporated on 16 March 2009 (RC 806865), KUIT LIMITED operates from Effurun-Warri with extensive field experience serving major energy clients including NNPC, NPDC, and CEPL.</p>'),
                'about_founder_image' => Setting::get('about_founder_image', ''),
                'site_logo_url'       => Setting::get('site_logo_url', ''),
                'blog_banner_url'     => Setting::get('blog_banner_url', ''),
            ]
        ]);
    }

    /**
     * Update settings keys.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_logo_url'                   => 'nullable|string|max:500',
            'enable_company_profile_download' => 'required|boolean',
            'company_profile_url'             => 'nullable|string|max:500',
            'company_profile_file'            => 'nullable|file|mimes:pdf|max:30720',
            'hero_slides'                     => 'nullable|array',
            'company_name'                    => 'nullable|string|max:200',
            'phone'                           => 'nullable|string|max:100',
            'whatsapp'                        => 'nullable|string|max:100',
            'email'                           => 'nullable|string|max:200',
            'address'                         => 'nullable|string|max:500',
            'about_mission'                   => 'nullable|string',
            'about_vision'                    => 'nullable|string',
            'about_founder_name'              => 'nullable|string|max:200',
            'about_founder_title'             => 'nullable|string|max:200',
            'about_founder_bio'               => 'nullable|string',
            'about_founder_image'             => 'nullable|string|max:500',
            'blog_banner_url'                 => 'nullable|string|max:500',
        ]);

        Setting::set('enable_company_profile_download', $validated['enable_company_profile_download'] ? 'true' : 'false');

        if ($request->hasFile('company_profile_file')) {
            $file = $request->file('company_profile_file');
            $fileName = 'kuit-limited-company-profile-' . time() . '.pdf';
            if (!file_exists(public_path('docs'))) {
                mkdir(public_path('docs'), 0755, true);
            }
            $file->move(public_path('docs'), $fileName);
            Setting::set('company_profile_url', '/docs/' . $fileName);
        } elseif (array_key_exists('company_profile_url', $validated) && !empty($validated['company_profile_url'])) {
            Setting::set('company_profile_url', $validated['company_profile_url']);
        }

        if (array_key_exists('company_name', $validated)) Setting::set('company_name', $validated['company_name'] ?? 'KUIT LIMITED');
        if (array_key_exists('phone', $validated)) Setting::set('phone', $validated['phone'] ?? '');
        if (array_key_exists('whatsapp', $validated)) {
            $rawWa = $validated['whatsapp'] ?? '';
            Setting::set('whatsapp', $rawWa);
            // Also store normalized digits for wa.me links
            $cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
            if (str_starts_with($cleanWa, '0') && strlen($cleanWa) === 11) {
                $cleanWa = '234' . substr($cleanWa, 1);
            }
            Setting::set('phone_whatsapp', $cleanWa);
        }
        if (array_key_exists('email', $validated)) Setting::set('email', $validated['email'] ?? '');
        if (array_key_exists('address', $validated)) Setting::set('address', $validated['address'] ?? '');

        $heroSlides = [];
        if (isset($validated['hero_slides']) && is_array($validated['hero_slides'])) {
            foreach ($validated['hero_slides'] as $slide) {
                if (!empty($slide['value']) && in_array($slide['type'] ?? '', ['link', 'upload'])) {
                    $heroSlides[] = [
                        'type' => $slide['type'],
                        'value' => $slide['value'],
                    ];
                }
            }
        }
        Setting::set('hero_slides', json_encode($heroSlides));

        if (isset($validated['about_mission'])) Setting::set('about_mission', $validated['about_mission']);
        if (isset($validated['about_vision'])) Setting::set('about_vision', $validated['about_vision']);
        if (isset($validated['about_founder_name'])) Setting::set('about_founder_name', $validated['about_founder_name']);
        if (isset($validated['about_founder_title'])) Setting::set('about_founder_title', $validated['about_founder_title']);
        if (isset($validated['about_founder_bio'])) Setting::set('about_founder_bio', $validated['about_founder_bio']);
        if (array_key_exists('about_founder_image', $validated)) Setting::set('about_founder_image', $validated['about_founder_image']);
        if (array_key_exists('blog_banner_url', $validated)) Setting::set('blog_banner_url', $validated['blog_banner_url'] ?? '');

        if (array_key_exists('site_logo_url', $validated)) {
            $logoUrl = $validated['site_logo_url'] ?? '';
            Setting::set('site_logo_url', $logoUrl);
            \App\Models\Business::query()->update(['logo_path' => $logoUrl ?: null]);
        }

        return redirect()->back()->with('message', 'Settings updated successfully!');
    }
}
