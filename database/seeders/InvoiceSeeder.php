<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\BusinessBankAccount;
use App\Models\Customer;
use App\Models\InvoiceItemCatalog;
use App\Models\InvoiceTemplate;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Business
        $business = Business::first();
        if ($business) {
            $business->name = 'KUIT LIMITED';
            $business->tagline = 'Marine | Construction | Engineering Services';
            $business->rc_number = 'RC 806865';
            $business->email = 'info@kuitltd.com';
            $business->website = 'https://kuitltd.com';
            $business->phone = '(+234) 803 280 2038';
            $business->phone_alt = '(+234) 703 344 2821';
            $business->address_line1 = '132, Airport Road';
            $business->address_line2 = 'Effurun-Warri';
            $business->city = 'Warri';
            $business->state = 'Delta State';
            $business->default_notes = 'Thank you for partnering with KUIT LIMITED. Excellence and safety in Marine, Construction and Engineering.';
            $business->footer_text = 'KUIT LIMITED • RC 806865 • 132, Airport Road, Effurun-Warri, Delta State';
            $business->save();
        } else {
            $business = Business::create([
                'name' => 'KUIT LIMITED',
                'tagline' => 'Marine | Construction | Engineering Services',
                'rc_number' => 'RC 806865',
                'tin' => 'TIN-80686500-0001',
                'phone' => '(+234) 803 280 2038',
                'phone_alt' => '(+234) 703 344 2821',
                'email' => 'info@kuitltd.com',
                'website' => 'https://kuitltd.com',
                'address_line1' => '132, Airport Road',
                'address_line2' => 'Effurun-Warri',
                'city' => 'Warri',
                'state' => 'Delta State',
                'vat_rate_bps' => 750, // 7.5%
                'default_vat_mode' => 'exclusive',
                'default_notes' => 'Thank you for partnering with KUIT LIMITED. Excellence and safety in Marine, Construction and Engineering.',
                'default_terms' => "1. Mobilisation deposit required prior to equipment dispatch or marine vessel departure.\n2. Equipment leasing rates apply on daily/monthly dry or wet lease terms as agreed.\n3. Safety and environmental compliance enforced per contract agreement.",
                'footer_text' => 'KUIT LIMITED • RC 806865 • 132, Airport Road, Effurun-Warri, Delta State',
            ]);
        }

        // 2. Bank Accounts
        $bankAccounts = [
            [
                'bank_name' => 'First Bank of Nigeria',
                'account_name' => 'KUIT LIMITED',
                'account_number' => '2019482011',
                'is_default' => true,
                'sort_order' => 1,
            ],
            [
                'bank_name' => 'Zenith Bank Plc',
                'account_name' => 'KUIT LIMITED',
                'account_number' => '1018492048',
                'is_default' => false,
                'sort_order' => 2,
            ],
        ];

        foreach ($bankAccounts as $bank) {
            BusinessBankAccount::updateOrCreate(
                [
                    'business_id' => $business->id,
                    'account_number' => $bank['account_number'],
                ],
                array_merge($bank, ['business_id' => $business->id])
            );
        }

        // 3. Invoice Templates
        $templates = [
            [
                'business_id' => $business->id,
                'name' => 'Classic Professional',
                'layout' => 'classic',
                'accent_color' => '#1e3a8a', // Deep corporate navy
                'font_family' => 'DejaVu Sans',
                'logo_position' => 'left',
                'document_title' => 'INVOICE',
                'show_fields' => [
                    'rc_number' => true,
                    'tin' => true,
                    'bank_accounts' => true,
                    'amount_in_words' => true,
                    'signature_line' => true,
                    'notes' => true,
                    'terms' => true,
                ],
                'show_watermark' => true,
                'number_prefix' => 'KUT-',
                'number_padding' => 4,
                'is_default' => true,
            ],
            [
                'business_id' => $business->id,
                'name' => 'Modern Emerald',
                'layout' => 'modern',
                'accent_color' => '#0F5132', // Nigerian Emerald Green
                'font_family' => 'DejaVu Sans',
                'logo_position' => 'left',
                'document_title' => 'TAX INVOICE',
                'show_fields' => [
                    'rc_number' => true,
                    'tin' => true,
                    'bank_accounts' => true,
                    'amount_in_words' => true,
                    'signature_line' => true,
                    'notes' => true,
                    'terms' => true,
                ],
                'show_watermark' => true,
                'number_prefix' => 'KUT-',
                'number_padding' => 4,
                'is_default' => false,
            ],
            [
                'business_id' => $business->id,
                'name' => 'Clean Minimal',
                'layout' => 'minimal',
                'accent_color' => '#111827', // Slate Charcoal
                'font_family' => 'DejaVu Sans',
                'logo_position' => 'center',
                'document_title' => 'INVOICE',
                'show_fields' => [
                    'rc_number' => true,
                    'tin' => true,
                    'bank_accounts' => true,
                    'amount_in_words' => true,
                    'signature_line' => false,
                    'notes' => true,
                    'terms' => true,
                ],
                'show_watermark' => false,
                'number_prefix' => 'KUT-',
                'number_padding' => 4,
                'is_default' => false,
            ],
        ];

        foreach ($templates as $tmpl) {
            InvoiceTemplate::firstOrCreate(
                [
                    'business_id' => $business->id,
                    'layout' => $tmpl['layout'],
                ],
                $tmpl
            );
        }

        // 4. Clear obsolete catalog items and seed KUIT LIMITED Items & Services Catalog
        InvoiceItemCatalog::where('business_id', $business->id)->delete();

        $catalogItems = [
            // ─── Heavy Equipment & Plant Leasing ───
            [
                'name' => 'CAT 330 Hydraulic Excavator (Dry Lease)',
                'description' => 'Heavy crawler excavator (30-ton class) for deep trenching, canalization, bulk earthworks and demolition. Dry lease excluding fuel and operator.',
                'default_price_kobo' => 35000000, // ₦350,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 28,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT 330 Hydraulic Excavator (Wet Lease - Fuel & Operator Included)',
                'description' => 'Heavy crawler excavator hire inclusive of certified heavy plant operator, daily diesel fuel supply and daily on-site maintenance servicing.',
                'default_price_kobo' => 55000000, // ₦550,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 34,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT 320 / 325 Hydraulic Excavator (Daily Lease)',
                'description' => '20-ton tracked excavator for site preparation, foundation digging, drainage trenching and pipeline right-of-way clearing.',
                'default_price_kobo' => 28000000, // ₦280,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 22,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT D6 Crawler Bulldozer (Daily Lease)',
                'description' => 'Heavy-duty track-type tractor equipped with semi-universal blade and multi-shank ripper for site leveling, clearing and backfilling.',
                'default_price_kobo' => 32000000, // ₦320,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 19,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT D8 Heavy Crawler Bulldozer (Monthly Lease)',
                'description' => 'High-capacity heavy crawler dozer for major land reclamation, massive cut-and-fill operations and swamp bund wall construction.',
                'default_price_kobo' => 850000000, // ₦8,500,000.00 / month
                'unit' => 'month',
                'is_vatable' => true,
                'usage_count' => 8,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT 140G / 140H Motor Grader (Daily Lease)',
                'description' => 'Tandem drive motor grader with 14ft moldboard, scarifier, and automatic slope control for precision roadway grading and earth shaping.',
                'default_price_kobo' => 26000000, // ₦260,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 16,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'CAT 950 / 966 Wheel Pay-Loader (Daily Lease)',
                'description' => 'Articulated wheel loader (3.5 - 4.2m³ bucket capacity) for quarry aggregate loading, sand stockpiling and asphalt plant feeding.',
                'default_price_kobo' => 24000000, // ₦240,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 15,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'Amphibious Swamp Buggy Excavator (Daily Lease)',
                'description' => 'Specialized pontoon-mounted swamp buggy excavator engineered for marshland, mangrove terrain, swamp dredging and oilfield flowline clearing.',
                'default_price_kobo' => 75000000, // ₦750,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 12,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => '60-Ton Mobile Hydraulic Telescopic Crane (Daily Charter)',
                'description' => 'All-terrain hydraulic mobile crane hire with certified crane operator, certified rigger, load safety indicator, and rigging slings.',
                'default_price_kobo' => 65000000, // ₦650,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 21,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => '100-Ton All-Terrain Heavy Crane (Daily Charter)',
                'description' => 'Heavy industrial telescopic crane for refinery turnarounds, heavy vessel offloading, offshore skid installation and bridge beam launching.',
                'default_price_kobo' => 120000000, // ₦1,200,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 9,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'Heavy-Duty 30-Ton to 60-Ton Forklift Yard Hire',
                'description' => 'High capacity industrial diesel forklift for pipe storage yard handling, shipping container maneuvering and warehouse cargo staging.',
                'default_price_kobo' => 22000000, // ₦220,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 18,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'Multi-Axle Low-Bed Equipment Haulage Trailer (Per Trip)',
                'description' => 'Heavy equipment transport trailer with escort pilot vehicle for inter-state mobilisation and demobilisation of heavy plant and machinery.',
                'default_price_kobo' => 95000000, // ₦950,000.00 / trip
                'unit' => 'trip',
                'is_vatable' => true,
                'usage_count' => 26,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'Self-Loading Hiab Crane Truck Charter (Daily Rate)',
                'description' => 'Heavy flatbed truck equipped with hydraulic knuckle-boom crane for self-loading, transport, and site placement of pumps, generators, and pipe spools.',
                'default_price_kobo' => 18000000, // ₦180,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 23,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => '400Amp Mobile Industrial Diesel Welding Rig (Daily Rate)',
                'description' => 'Dual-operator diesel engine driven welding machine (Miller / Lincoln) for field structural fabrication, pipe welding and shipyard repair.',
                'default_price_kobo' => 6500000, // ₦65,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 31,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => 'Industrial Air Compressor (375 - 750 CFM, Daily Hire)',
                'description' => 'Heavy rotary screw portable diesel air compressor for grit blasting, pipeline pressure testing, pneumatic tools, and well dewatering.',
                'default_price_kobo' => 9500000, // ₦95,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 24,
                'category' => 'Heavy Plant Leasing',
            ],
            [
                'name' => '250kVA Soundproof Industrial Generator Hire (Daily Rate)',
                'description' => 'Heavy Cummins-powered continuous duty soundproof diesel generator with automatic changeover panel for site and plant operations.',
                'default_price_kobo' => 8500000, // ₦85,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 27,
                'category' => 'Heavy Plant Leasing',
            ],

            // ─── Marine Fleet & Vessel Charter ───
            [
                'name' => 'Coastal Product Tanker Vessel Charter (Spot / Time Charter)',
                'description' => 'Double-hull clean petroleum product (AGO/PMS/DPK) tanker vessel for bunkering, coastal cargo distribution, and offshore lightering operations.',
                'default_price_kobo' => 450000000, // ₦4,500,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 14,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Offshore Platform Supply Vessel (PSV) (Daily Charter)',
                'description' => 'Dynamic positioning PSV equipped with heavy cargo deck, under-deck mud tanks, drill water and fuel transfer systems for offshore drilling rigs.',
                'default_price_kobo' => 380000000, // ₦3,800,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 11,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Ocean-Going Sea Tug Boat (High Bollard Pull, Daily Charter)',
                'description' => 'Twin-screw ocean tug boat with high bollard pull capacity, heavy towing winch, firefighting monitors and certified marine crew for rig moves.',
                'default_price_kobo' => 260000000, // ₦2,600,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 17,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Passenger Crew Boat (Pelican Calm Class, Daily Charter)',
                'description' => 'High-speed aluminum hull crew transfer vessel (30-seat air-conditioned cabin) with certified life-saving equipment for offshore crew shifts.',
                'default_price_kobo' => 140000000, // ₦1,400,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 29,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Security Escort Patrol Vessel Charter (Daily Rate)',
                'description' => 'Armored naval-approved fast security patrol craft equipped with modern radar, communication gear and dedicated Nigerian Navy detachment quarters.',
                'default_price_kobo' => 220000000, // ₦2,200,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 15,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Flat-Top Deck Cargo Barge (2,000 DWT, Daily Hire)',
                'description' => 'Heavy steel deck cargo barge for waterborne transport of heavy plant machinery, tubulars, aggregates, and pre-cast concrete structures.',
                'default_price_kobo' => 45000000, // ₦450,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 13,
                'category' => 'Marine Fleet Charter',
            ],
            [
                'name' => 'Marine AGO / Low-Sulfur Diesel Bunkering Supply',
                'description' => 'Offshore and quayside ship-to-ship bunkering of high-flashpoint, ultra-low sulfur Automotive Gas Oil (AGO) with calibrated flow meter delivery.',
                'default_price_kobo' => 125000000, // ₦1,250,000.00 / metric ton
                'unit' => 'ton',
                'is_vatable' => true,
                'usage_count' => 38,
                'category' => 'Marine Fleet Charter',
            ],

            // ─── Civil Works & Construction Infrastructure ───
            [
                'name' => 'Site Clearing, De-stumping & Bush Grubbing (Per Hectare)',
                'description' => 'Complete mechanical clearing of vegetation, tree felling, root de-stumping, leveling, burning, and debris disposal for greenfield construction.',
                'default_price_kobo' => 85000000, // ₦850,000.00 / ha
                'unit' => 'ha',
                'is_vatable' => true,
                'usage_count' => 20,
                'category' => 'Civil Engineering & Works',
            ],
            [
                'name' => 'Laterite / Sharp Sand Earth Filling & Compaction (Per m³)',
                'description' => 'Supply and haulage of approved laterite filling material, spreading in 150mm layers, watering, and rolling to minimum 98% Proctor dry density.',
                'default_price_kobo' => 950000, // ₦9,500.00 / m³
                'unit' => 'm³',
                'is_vatable' => true,
                'usage_count' => 45,
                'category' => 'Civil Engineering & Works',
            ],
            [
                'name' => 'Reinforced Concrete Drainage & Box Culvert Construction',
                'description' => 'Excavation, lean concrete blinding, high-yield steel reinforcement, marine-ply formwork, and casting of Grade 25 reinforced concrete drainage channels.',
                'default_price_kobo' => 4500000, // ₦45,000.00 / linear metre
                'unit' => 'm',
                'is_vatable' => true,
                'usage_count' => 32,
                'category' => 'Civil Engineering & Works',
            ],
            [
                'name' => 'Asphaltic Concrete Road Surfacing (50mm Wearing Course)',
                'description' => 'Prime coat bituminous emulsion spray application, machine laying of hot-mix asphaltic concrete (50mm compacted thickness), and pneumatic rolling.',
                'default_price_kobo' => 1450000, // ₦14,500.00 / m²
                'unit' => 'm²',
                'is_vatable' => true,
                'usage_count' => 25,
                'category' => 'Civil Engineering & Works',
            ],
            [
                'name' => 'Industrial Heavy-Duty Concrete Hardstanding Yard (200mm)',
                'description' => 'Construction of heavy plant loading hardstanding slab with BRC A252 fabric mesh, saw-cut expansion joints, and power float broom finish.',
                'default_price_kobo' => 2800000, // ₦28,000.00 / m²
                'unit' => 'm²',
                'is_vatable' => true,
                'usage_count' => 18,
                'category' => 'Civil Engineering & Works',
            ],
            [
                'name' => 'Steel Sheet Piling & Shoreline Erosion Control (Per Linear Metre)',
                'description' => 'Vibratory driving of interlocking Larssen/AZ steel sheet piles, tie-rod installation, capping beam casting and shoreline protection wall assembly.',
                'default_price_kobo' => 18500000, // ₦185,000.00 / m
                'unit' => 'm',
                'is_vatable' => true,
                'usage_count' => 11,
                'category' => 'Civil Engineering & Works',
            ],

            // ─── Oil & Gas Technical Support ───
            [
                'name' => 'Robertshaw Pneumatic Safety Control Panel Overhaul & Calibration',
                'description' => 'Complete offshore/onshore wellhead shutdown panel overhaul, pneumatic sensor inspection, relay valve rebuilding, pressure testing and trip certification.',
                'default_price_kobo' => 185000000, // ₦1,850,000.00 / panel
                'unit' => 'panel',
                'is_vatable' => true,
                'usage_count' => 22,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Well Clean-Up & Post-Intervention Flowback Support (Daily Rate)',
                'description' => 'Provision of flowback engineers, surface sand separation units, choke manifold monitoring, fluid sampling, and safe hydrocarbon recovery control.',
                'default_price_kobo' => 120000000, // ₦1,200,000.00 / day
                'unit' => 'day',
                'is_vatable' => true,
                'usage_count' => 16,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Pipeline Right-of-Way Trenching, Welding & Lowering-In (Per Metre)',
                'description' => 'Trench excavation in swamp/dry terrain, carbon steel pipe stringing, beveling, manual/semi-automatic arc welding, NDT examination and lowering-in.',
                'default_price_kobo' => 6500000, // ₦65,000.00 / m
                'unit' => 'm',
                'is_vatable' => true,
                'usage_count' => 21,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Pipeline Field Joint Coating & Heat-Shrink Sleeve Application',
                'description' => 'Grit blast cleaning of welded field joints to ISO 8501-1 Sa 2.5 profile, epoxy primer coating, and installation of 3-layer cross-linked polyethylene sleeves.',
                'default_price_kobo' => 8500000, // ₦85,000.00 / joint
                'unit' => 'joint',
                'is_vatable' => true,
                'usage_count' => 27,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Hydrostatic Pipeline Pressure Testing & Dewatering (Per Section)',
                'description' => 'Filling with chemically treated water, staged pressurization up to 1.5x design pressure, 24-hr hold recording, dewatering, and nitrogen purge drying.',
                'default_price_kobo' => 250000000, // ₦2,500,000.00 / section
                'unit' => 'section',
                'is_vatable' => true,
                'usage_count' => 15,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Specialty Demulsifier & Production Chemical Supply (200L Drum)',
                'description' => 'High-performance oilfield emulsion breaker, corrosion inhibitor, and scale dissolver formulation supplied in UN-certified 200-litre sealed steel drums.',
                'default_price_kobo' => 68000000, // ₦680,000.00 / drum
                'unit' => 'drum',
                'is_vatable' => true,
                'usage_count' => 33,
                'category' => 'Oil & Gas Support',
            ],
            [
                'name' => 'Pressure Safety Valve (PSV) Recertification & Lapping (Per Valve)',
                'description' => 'Complete valve dismantling, ultrasonic degreasing, tungsten carbide seat lapping, spring calibration, helium pop-test, and DPR/NUPRC test certification.',
                'default_price_kobo' => 22000000, // ₦220,000.00 / unit
                'unit' => 'pcs',
                'is_vatable' => true,
                'usage_count' => 24,
                'category' => 'Oil & Gas Support',
            ],

            // ─── IT & Enterprise Solutions ───
            [
                'name' => 'Enterprise Cloud Infrastructure Setup & Architecture (AWS / Azure)',
                'description' => 'Production cloud VPC architecture, automated Kubernetes/Docker deployment, load balancers, multi-region database replication, and ISO-compliant IAM security.',
                'default_price_kobo' => 350000000, // ₦3,500,000.00 / project
                'unit' => 'project',
                'is_vatable' => true,
                'usage_count' => 14,
                'category' => 'IT & Enterprise Solutions',
            ],
            [
                'name' => 'Custom Enterprise Business Workflow & Portal Engineering',
                'description' => 'Full-lifecycle software engineering of custom web and mobile business workflows, ERP integration, digital ticketing, client portals, and secure API gateways.',
                'default_price_kobo' => 550000000, // ₦5,500,000.00 / project
                'unit' => 'project',
                'is_vatable' => true,
                'usage_count' => 12,
                'category' => 'IT & Enterprise Solutions',
            ],
            [
                'name' => 'Corporate Structured Fiber Cabling & Managed Wi-Fi Network',
                'description' => 'Supply and installation of Cat6A/Single-Mode optical fiber structured backbone, rack termination, PoE switches, firewall gateway, and enterprise Wi-Fi 6 APs.',
                'default_price_kobo' => 220000000, // ₦2,200,000.00 / project
                'unit' => 'project',
                'is_vatable' => true,
                'usage_count' => 19,
                'category' => 'IT & Enterprise Solutions',
            ],
            [
                'name' => 'Annual Managed IT Infrastructure, Cybersecurity & Server SLA',
                'description' => '12-month proactive 24/7 server monitoring, cyber-threat defense, automated off-site cloud backups, emergency on-site engineer dispatch, and quarterly audits.',
                'default_price_kobo' => 480000000, // ₦4,800,000.00 / year
                'unit' => 'year',
                'is_vatable' => true,
                'usage_count' => 16,
                'category' => 'IT & Enterprise Solutions',
            ],
        ];

        foreach ($catalogItems as $item) {
            $normalized = InvoiceItemCatalog::normalizeName($item['name']);
            InvoiceItemCatalog::create(array_merge($item, [
                'business_id' => $business->id,
                'normalized_name' => $normalized,
                'last_price_kobo' => $item['default_price_kobo'],
                'last_used_at' => now(),
            ]));
        }

        // 5. Seed sample corporate customers
        Customer::where('business_id', $business->id)->where('notes', 'like', '%solar%')->delete();

        if (Customer::where('business_id', $business->id)->count() === 0) {
            Customer::create([
                'business_id' => $business->id,
                'name' => 'Chevron Nigeria JV Operations Support',
                'email' => 'logistics@chevron-jv-ops.com.ng',
                'phone' => '+234 803 555 1204',
                'tin' => 'TIN-4820194-0001',
                'address' => "Escravos Marine Terminal / Chevron Operations Base\nDelta State, Nigeria",
                'notes' => 'Corporate client: Marine vessel charter & offshore technical supplies',
            ]);

            Customer::create([
                'business_id' => $business->id,
                'name' => 'Niger Delta Coastal Infrastructure Consortium',
                'email' => 'procurement@ndcic-projects.ng',
                'phone' => '+234 802 770 9182',
                'tin' => 'TIN-7739102-0002',
                'address' => "Plot 42, Trans-Amadi Industrial Layout\nPort Harcourt, Rivers State, Nigeria",
                'notes' => 'Corporate client: Heavy equipment leasing & road construction works',
            ]);
        }
    }
}
