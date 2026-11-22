<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta['title'] ?? config('app.name', 'KUIT LIMITED') . ' | Marine, Construction & Engineering Services' }}</title>

    <meta name="description"
        content="{{ $meta['description'] ?? 'KUIT LIMITED (RC 806865) is a premier Nigerian contractor specializing in heavy construction equipment leasing (CAT excavators, bulldozers, cranes), marine vessel charter (tankers, tugs, crew boats), civil engineering, roads and bridges, oil & gas field support (Robertshaw E&I panels, well clean-up, chemicals, pipeline construction), and enterprise IT solutions based in Effurun-Warri, Delta State.' }}">
    <meta name="keywords"
        content="{{ $meta['keywords'] ?? 'KUIT LIMITED, KUIT, RC 806865, RC806865, Kuit Nigeria, Kuit Limited Warri, 132 Airport Road Effurun Warri, marine services Nigeria, marine vessel charter Niger Delta, tanker vessels charter, product tanker, offshore supply vessels OSV, sea going tug boats, ocean tug boat hire, high bollard pull tug, passenger crew boats, fast crew boat Pelican Calm, deck cargo barge, flat top barge rental, marine bunkering AGO MGO, heavy equipment leasing Nigeria, plant hire Warri, equipment rental Delta State, CAT 330 excavator lease, CAT 320 excavator, CAT 325 excavator, Caterpillar excavator hire, low-bed trailers haulage, CAT 950 pay-loader, wheel loader rental, CAT D8 bulldozer hire, CAT D6 bulldozer, swamp buggy excavator hire, amphibious excavator Niger Delta, marshland excavation, 60 Ton forklift hire, 140G CAT graders, motor grader hire, site concrete mixers batching, 400Amp welding machines, industrial welding rig, industrial compressors hire, diesel air compressor, 60-100tons cranes, mobile crane hire, crawler crane charter, dry lease equipment Nigeria, wet lease plant hire, oil and gas services Nigeria, Robertshaw control panel maintenance, instrumentation calibration troubleshooting, pneumatic shutdown panel, well clean-up post-intervention, well stimulation field support, flowback testing, oilfield chemical supply, drilling completion treatment chemicals, chemical logistics Niger Delta, pipeline flowline construction, pipe fabrication radiographic welding, pipeline hydro-testing dewatering, NNPC contractor, NPDC vendor, Century Exploration CEPL, civil engineering contractor Nigeria, roads and bridges construction Nigeria, laterite sand filling compaction, reinforced concrete drainage box culverts, asphalt road paving, industrial concrete hardstanding, shoreline erosion protection, Quality Safety Personnel QSP, Smart and Safe corporate policy, host community relations Niger Delta, enterprise IT solutions Nigeria, cloud infrastructure, Effurun-Warri, Delta State, Port Harcourt, Lagos, Escravos, Forcados, Bonny, Nigeria' }}">
    <meta name="robots" content="index, follow">

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

    <!-- ── SEO: Open Graph (Facebook / LinkedIn) ──────────────────────── -->
    @if(isset($meta))
        <meta property="og:title" content="{{ $meta['title'] }}">
        <meta property="og:description" content="{{ $meta['description'] }}">
        <meta property="og:image" content="{{ $meta['image'] ?? $ldLogoUrl }}">
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
        <meta name="twitter:image" content="{{ $meta['image'] ?? $ldLogoUrl }}">
    @else
        <meta property="og:title" content="KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria">
        <meta property="og:description"
            content="KUIT LIMITED (RC 806865) is a premier Nigerian contractor specializing in heavy construction equipment leasing (CAT excavators, bulldozers, cranes), marine vessel charter (tankers, tugs, crew boats), civil engineering, roads and bridges, oil & gas field support (Robertshaw E&I panels, well clean-up, chemicals, pipeline construction), and enterprise IT solutions based in Effurun-Warri, Delta State.">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="KUIT LIMITED">
        <meta property="og:locale" content="en_NG">
        <meta property="og:image" content="{{ $ldLogoUrl }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- ── SEO: Twitter / X Card ──────────────────────────────────── -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria">
        <meta name="twitter:description"
            content="KUIT LIMITED (RC 806865) is a premier Nigerian contractor specializing in heavy construction equipment leasing (CAT excavators, bulldozers, cranes), marine vessel charter (tankers, tugs, crew boats), civil engineering, roads and bridges, oil & gas field support (Robertshaw E&I panels, well clean-up, chemicals, pipeline construction), and enterprise IT solutions based in Effurun-Warri, Delta State.">
        <meta name="twitter:image" content="{{ $ldLogoUrl }}">
    @endif

    <!-- ── SEO: JSON-LD Structured Data (Organization) ───────────────── -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "KUIT LIMITED",
        "alternateName": ["KUIT", "KUIT Ltd", "Kuit Limited Warri"],
        "identifier": "RC 806865",
        "description": "KUIT LIMITED (RC 806865) is a premier Nigerian contractor specializing in heavy construction equipment leasing, marine vessel charter, civil engineering, oil & gas field support, and IT solutions, incorporated in 2009 in Effurun-Warri, Delta State.",
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

    @if(!empty($ldLogo))
        <link rel="icon" href="{{ $ldLogoUrl }}">
        <link rel="apple-touch-icon" href="{{ $ldLogoUrl }}">
    @else
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}?v=3">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}?v=3">
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=3">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=3">
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}?v=3">
    @endif
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