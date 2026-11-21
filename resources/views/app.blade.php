<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta['title'] ?? config('app.name', 'KUIT LIMITED') . ' | Marine, Construction & Engineering Services' }}</title>

    <meta name="description"
        content="{{ $meta['description'] ?? 'KUIT LIMITED (RC 806865) provides marine services, construction equipment leasing, engineering, oil & gas support and IT solutions from Effurun-Warri, Delta State, Nigeria.' }}">
    <meta name="keywords"
        content="{{ $meta['keywords'] ?? 'KUIT LIMITED, KUIT, RC 806865, marine services Nigeria, equipment leasing Warri, excavator hire Delta State, marine vessel charter Nigeria, oil and gas services Nigeria, pipeline construction, oilfield chemicals supply, cloud solutions Nigeria, app development Warri, construction Effurun Warri' }}">
    <meta name="robots" content="index, follow">

    <!-- ── SEO: Open Graph (Facebook / LinkedIn) ──────────────────────── -->
    @if(isset($meta))
        <meta property="og:title" content="{{ $meta['title'] }}">
        <meta property="og:description" content="{{ $meta['description'] }}">
        <meta property="og:image" content="{{ $meta['image'] ?? asset('images/logo.png') }}">
        <meta property="og:type" content="{{ $meta['type'] ?? 'website' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="KUIT LIMITED">
        <meta property="og:locale" content="en_NG">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">

        <!-- ── SEO: Twitter / X Card ──────────────────────────────────── -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $meta['title'] }}">
        <meta name="twitter:description" content="{{ $meta['description'] }}">
        <meta name="twitter:image" content="{{ $meta['image'] ?? asset('images/logo.png') }}">
    @else
        <meta property="og:title" content="KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria">
        <meta property="og:description"
            content="KUIT LIMITED (RC 806865) provides marine services, construction equipment leasing, engineering, oil & gas support and IT solutions from Effurun-Warri, Delta State, Nigeria.">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="KUIT LIMITED">
        <meta property="og:locale" content="en_NG">
        <meta property="og:image" content="{{ asset('images/logo.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- ── SEO: Twitter / X Card ──────────────────────────────────── -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria">
        <meta name="twitter:description"
            content="KUIT LIMITED (RC 806865) provides marine services, construction equipment leasing, engineering, oil & gas support and IT solutions from Effurun-Warri, Delta State, Nigeria.">
        <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    @endif

    <!-- ── SEO: JSON-LD Structured Data (Organization) ───────────────── -->
    @php
        try {
            $ldLogo = \App\Models\Setting::get('site_logo_url');
            $ldLogoUrl = $ldLogo ? (str_starts_with($ldLogo, 'http') ? $ldLogo : url($ldLogo)) : asset('images/logo.png');
            $ldPhone = \App\Models\Setting::get('phone', '(+234) 803 280 2038');
            $ldEmail = \App\Models\Setting::get('email', 'info@kuitltd.com');
        } catch (\Throwable $e) {
            $ldLogoUrl = asset('images/logo.png');
            $ldPhone = '(+234) 803 280 2038';
            $ldEmail = 'info@kuitltd.com';
        }
    @endphp
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "KUIT LIMITED",
        "alternateName": ["KUIT", "KUIT Ltd", "Kuit Limited Warri"],
        "identifier": "RC 806865",
        "description": "KUIT LIMITED (RC 806865) is a Nigerian marine services, equipment leasing, engineering and oil & gas support company, established in 2009 with modern IT solutions.",
        "url": "{{ config('app.url') }}",
        "logo": "{{ $ldLogoUrl }}",
        "telephone": "{{ $ldPhone }}",
        "email": "{{ $ldEmail }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "132, Airport Road",
            "addressLocality": "Effurun-Warri",
            "addressRegion": "Delta State",
            "addressCountry": "NG"
        },
        "areaServed": ["Effurun-Warri", "Delta State", "Niger Delta", "Lagos", "Port Harcourt", "Abuja", "Nigeria"],
        "hasOfferCatalog": {
            "@@type": "OfferCatalog",
            "name": "KUIT LIMITED Services",
            "itemListElement": [
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Marine Services & Vessel Charter" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Construction & Heavy Equipment Leasing" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Engineering Planning & Structural Works" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Oil & Gas Field, E&I & Pipeline Services" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "IT Solutions & Cloud Application Development" } }
            ]
        }
    }
    </script>

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=3">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=3">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}?v=3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @inertiaHead
    @routes
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-900">
    @inertia
</body>

</html>