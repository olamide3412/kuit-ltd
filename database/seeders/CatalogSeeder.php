<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate existing catalog tables to seed clean KUIT data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_inclusions')->truncate();
        DB::table('products')->truncate();
        DB::table('product_categories')->truncate();
        DB::table('services')->truncate();
        DB::table('service_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Service Categories (5 Core Pillars)
        $marineCatId = DB::table('service_categories')->insertGetId([
            'name' => 'Marine Services',
            'slug' => 'marine-services',
            'description' => 'Reliable tanker vessels, offshore supply vessels, sea-going tugs and passenger crew boats for maritime operations across Nigeria.',
            'icon' => 'ship',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $constCatId = DB::table('service_categories')->insertGetId([
            'name' => 'Construction & Equipment Leasing',
            'slug' => 'construction-equipment-leasing',
            'description' => 'Modern earthmoving plant, heavy excavators, low-bed trailers, cranes, and civil works infrastructure across Nigeria.',
            'icon' => 'truck-monster',
            'sort_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $engCatId = DB::table('service_categories')->insertGetId([
            'name' => 'Engineering Services',
            'slug' => 'engineering-services',
            'description' => 'Comprehensive infrastructure planning, structural design, electrical and mechanical engineering, and materials procurement.',
            'icon' => 'cogs',
            'sort_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $oilGasCatId = DB::table('service_categories')->insertGetId([
            'name' => 'Oil & Gas Services',
            'slug' => 'oil-and-gas-services',
            'description' => 'Specialised technical, field and supply support for energy-sector projects including E&I, well services, chemicals and pipelines.',
            'icon' => 'oil-well',
            'sort_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $itCatId = DB::table('service_categories')->insertGetId([
            'name' => 'IT Services',
            'slug' => 'it-services',
            'description' => 'Modern technology solutions including cloud infrastructure, enterprise software, web and mobile app development.',
            'icon' => 'laptop-code',
            'sort_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Services under Pillars
        // 2.1 Marine Services
        DB::table('services')->insert([
            [
                'category_id' => $marineCatId,
                'name' => 'Marine Services & Vessel Fleet',
                'slug' => 'marine-services-fleet',
                'summary' => 'Comprehensive marine vessel charter and operations: tanker vessels, supply vessels, sea-going tug boats and passenger crew boats.',
                'body' => 'KUIT LIMITED delivers dependable marine support for offshore operations, energy sector logistics, and waterway transport. Our marine capabilities encompass product tanker vessels, offshore platform supply vessels, high-bollard pull sea-going tugs, and swift passenger crew transfer boats.',
                'hero_image' => '/images/marine-tanker.webp',
                'icon' => 'ship',
                'benefits' => json_encode([
                    'Rigorous safety protocols adhering to maritime standards',
                    'Experienced marine crew and certified navigation officers',
                    'Flexible time charter and spot charter arrangements',
                    'Dedicated operational support and 24/7 shore assistance',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Charter Scope & Requirement', 'desc' => 'Define vessel specifications, route, charter duration and cargo/passenger requirements.'],
                    ['step' => 2, 'title' => 'Vessel Sourcing & Inspection', 'desc' => 'Technical vetting and confirmation of vessel readiness and maritime documentation.'],
                    ['step' => 3, 'title' => 'Mobilisation & Departure', 'desc' => 'Pre-voyage briefing, safety briefing and timely departure to operational coordinates.'],
                    ['step' => 4, 'title' => 'Operations & Demobilisation', 'desc' => 'Continuous voyage monitoring, periodic reporting and structured demobilisation.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2.2 Construction and Equipment Leasing
        DB::table('services')->insert([
            [
                'category_id' => $constCatId,
                'name' => 'Heavy Equipment Leasing & Rentals',
                'slug' => 'heavy-equipment-leasing',
                'summary' => 'Leasing of high-performance excavators (CAT 330, 320, 325), bulldozers (D6, D8), graders, cranes, loaders and low-beds.',
                'body' => 'We maintain a versatile fleet of heavy construction machinery available on dry or wet lease terms. Our fleet includes CAT excavators, D6 and D8 bulldozers, 140G graders, wheel loaders, swamp buggies for marshy terrain, 60-ton forklifts and mobile cranes up to 100-ton capacity.',
                'hero_image' => '/images/equipment-excavator.webp',
                'icon' => 'truck-monster',
                'benefits' => json_encode([
                    'Well-maintained Tier-1 Caterpillar and premium equipment',
                    'Available with certified, experienced operators or on dry lease',
                    'Fast mobilisation to project sites across Delta State and nationwide',
                    'On-site technical support to ensure minimal machinery downtime',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Equipment Selection', 'desc' => 'Identify required machinery, project terrain and estimated rental duration.'],
                    ['step' => 2, 'title' => 'Commercial Proposal', 'desc' => 'Transparent daily/monthly rates with mobilisation and demobilisation terms.'],
                    ['step' => 3, 'title' => 'Site Delivery & Dispatch', 'desc' => 'Transport via low-bed trailers directly to your project location.'],
                    ['step' => 4, 'title' => 'Field Support & Maintenance', 'desc' => 'Regular servicing and responsive mechanical support on site.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $constCatId,
                'name' => 'Civil Works, Road & Bridge Construction',
                'slug' => 'civil-works-road-construction',
                'summary' => 'Site clearance, building demolition, road compaction, drainage channel excavation, earthworks and sand filling.',
                'body' => 'With extensive field experience executing civil works for government agencies and corporate clients, KUIT LIMITED undertakes complete site development, drainage infrastructure, road sub-base preparation, earthworks, and structural concrete projects.',
                'hero_image' => '/images/project-road-compaction.webp',
                'icon' => 'hard-hat',
                'benefits' => json_encode([
                    'End-to-end execution from initial clearing to final handover',
                    'Full fleet integration with in-house machinery reducing contract delays',
                    'Strict compliance with civil engineering standards and environmental safety',
                    'Proven track record across Niger Delta infrastructure projects',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Site Survey & Engineering Review', 'desc' => 'Topographical review, soil assessment and project timeline planning.'],
                    ['step' => 2, 'title' => 'Mobilisation & Groundwork', 'desc' => 'Plant deployment, site perimeter clearing and earthworks.'],
                    ['step' => 3, 'title' => 'Construction Execution', 'desc' => 'Drainage excavation, sub-base compaction, and concrete placement.'],
                    ['step' => 4, 'title' => 'Quality Audit & Handover', 'desc' => 'Engineering inspection, punch-list resolution and formal client handover.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2.3 Engineering Services
        DB::table('services')->insert([
            [
                'category_id' => $engCatId,
                'name' => 'Planning, Design and Structural Engineering',
                'slug' => 'planning-design-engineering',
                'summary' => 'Infrastructure planning, structural engineering design, electrical/mechanical installations and procurement.',
                'body' => 'Our engineering practice provides multidisciplinary solutions ranging from pre-feasibility infrastructure planning and structural modeling to electrical works, erection of support structures, mechanical transportation, and technical procurement.',
                'hero_image' => '/images/project-pipe-laying.webp',
                'icon' => 'drafting-compass',
                'benefits' => json_encode([
                    'Integrated planning reducing procurement bottlenecks',
                    'Experienced multidisciplinary engineering personnel',
                    'Adherence to British Standards and Nigerian building codes',
                    'Cost-effective material sourcing and quality assurance',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Requirement Definition', 'desc' => 'Project brief analysis, engineering parameters and budget targets.'],
                    ['step' => 2, 'title' => 'Detailed Engineering Design', 'desc' => 'Structural blueprints, load calculations and procurement schedules.'],
                    ['step' => 3, 'title' => 'Procurement & Fabrication', 'desc' => 'Material inspection, vendor vetting and shop fabrication.'],
                    ['step' => 4, 'title' => 'Installation & Certification', 'desc' => 'Erection, commissioning tests and engineering documentation.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2.4 Oil & Gas Services
        DB::table('services')->insert([
            [
                'category_id' => $oilGasCatId,
                'name' => 'Oil & Gas Field & Technical Support',
                'slug' => 'oil-gas-field-support',
                'summary' => 'Electrical & Instrumentation (Robertshaw panels), Well clean-up & stimulation, Oilfield chemicals, and Pipeline construction.',
                'body' => 'KUIT LIMITED delivers specialised technical, field and supply support for energy-sector projects. Our capabilities include Robertshaw control panel maintenance, instrumentation calibration, well clean-up and post-intervention support, flowback testing, supply of drilling/production chemicals, and onshore/offshore pipeline welding and civil laying. Note: Services are delivered in accordance with applicable project requirements and through appropriately qualified personnel and project partners where required.',
                'hero_image' => '/images/oilgas-wellhead.webp',
                'icon' => 'fire',
                'benefits' => json_encode([
                    'Experienced E&I and well intervention technicians',
                    'Quality Robertshaw control panel servicing and calibration',
                    'Fast-response pipeline welding and trenching civil crews',
                    'Direct supply of high-grade drilling and production chemicals',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Scope Verification', 'desc' => 'Detailed work-pack review and safety hazard assessment (JHA/JSA).'],
                    ['step' => 2, 'title' => 'Personnel & Material Mobilisation', 'desc' => 'Deployment of qualified personnel, chemicals and specialised tooling.'],
                    ['step' => 3, 'title' => 'Field Execution', 'desc' => 'Execution strictly complying with environmental and safety standards.'],
                    ['step' => 4, 'title' => 'Testing & Documentation', 'desc' => 'Hydro-testing, calibration certificates and operational sign-off.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2.5 IT Services
        DB::table('services')->insert([
            [
                'category_id' => $itCatId,
                'name' => 'IT Services & Cloud Solutions',
                'slug' => 'it-services-cloud-development',
                'summary' => 'Modern digital solutions: cloud infrastructure setup, data backup, web & mobile applications, and enterprise software.',
                'body' => 'Extending our engineering excellence into the digital era, KUIT LIMITED provides practical technology solutions that empower enterprises. We offer robust cloud setup and migration, secure data backup architectures, and custom web and mobile application development engineered for high reliability.',
                'hero_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop',
                'icon' => 'laptop-code',
                'benefits' => json_encode([
                    'Secure cloud architectures with automated disaster recovery',
                    'Modern responsive web applications built for speed on mobile data',
                    'Tailored business workflows eliminating manual administrative bottlenecks',
                    'Long-term maintenance, security patching and technical support',
                ]),
                'process' => json_encode([
                    ['step' => 1, 'title' => 'Discover', 'desc' => 'Understanding business objectives, user workflows, and technical parameters.'],
                    ['step' => 2, 'title' => 'Design', 'desc' => 'System architecture blueprint, user interface wireframes, and security mapping.'],
                    ['step' => 3, 'title' => 'Build', 'desc' => 'Iterative development, rigorous automated testing, and cloud deployment.'],
                    ['step' => 4, 'title' => 'Support', 'desc' => 'Staff training, continuous monitoring, and scheduled feature updates.'],
                ]),
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Product Categories (Equipment & Fleet Catalog)
        $constEquipCat = DB::table('product_categories')->insertGetId([
            'name' => 'Construction Plant & Heavy Machinery',
            'slug' => 'construction-plant-machinery',
            'description' => 'Heavy earthmoving equipment, excavators, bulldozers, graders, and loaders for hire.',
            'icon' => 'truck-monster',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $marineFleetCat = DB::table('product_categories')->insertGetId([
            'name' => 'Marine Fleet & Vessels',
            'slug' => 'marine-fleet-vessels',
            'description' => 'Tanker vessels, offshore supply vessels, sea-going tugs, and passenger crew boats.',
            'icon' => 'ship',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $haulageCat = DB::table('product_categories')->insertGetId([
            'name' => 'Lifting & Heavy Haulage',
            'slug' => 'lifting-heavy-haulage',
            'description' => 'Low-bed trailers, heavy forklifts, and mobile cranes from 60 to 100 tons.',
            'icon' => 'dolly',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Equipment Products (Lease Catalog)
        $equipment = [
            [
                'category_id' => $constEquipCat,
                'name' => 'Caterpillar 330 Hydraulic Excavator',
                'slug' => 'cat-330-hydraulic-excavator',
                'sku' => 'KUT-EQP-CAT330',
                'summary' => 'Heavy-duty 30-ton class hydraulic excavator designed for mass earthworks, deep trenching, and civil infrastructure.',
                'description' => 'The CAT 330 delivers high digging force, fuel efficiency, and durable reinforced boom/stick design. Available for short-term and long-term project leases across Nigeria.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Certified operational readiness with scheduled maintenance support',
                'specs' => json_encode([
                    'Operating Weight' => 'Approx. 30,000 kg',
                    'Engine Power' => '204 kW (273 hp)',
                    'Max Digging Depth' => '7.24 m',
                    'Bucket Capacity' => '1.5 - 1.8 m³',
                    'Application' => 'Quarrying, civil engineering, pipeline excavation, heavy trenching',
                ]),
                'brand' => 'Caterpillar',
                'image' => '/images/equipment-excavator.webp',
                'stock_qty' => 5,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $constEquipCat,
                'name' => 'Caterpillar 320 Hydraulic Excavator',
                'slug' => 'cat-320-hydraulic-excavator',
                'sku' => 'KUT-EQP-CAT320',
                'summary' => '20-ton versatile excavator combining speed, precision, and low fuel consumption for medium-to-large civil contracts.',
                'description' => 'The industry benchmark CAT 320 offers optimal productivity for drainage works, road construction, building foundation excavation, and site grading.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Routine servicing and certified operators available',
                'specs' => json_encode([
                    'Operating Weight' => 'Approx. 22,000 kg',
                    'Engine Power' => '117 kW (157 hp)',
                    'Max Digging Depth' => '6.72 m',
                    'Bucket Capacity' => '1.0 - 1.2 m³',
                    'Application' => 'Road construction, drainage channel excavation, foundation digging',
                ]),
                'brand' => 'Caterpillar',
                'image' => '/images/equipment-excavator.webp',
                'stock_qty' => 6,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $constEquipCat,
                'name' => 'Caterpillar D8 Track Bulldozer',
                'slug' => 'cat-d8-track-bulldozer',
                'sku' => 'KUT-EQP-CATD8',
                'summary' => 'High-power crawler dozer with heavy blade capacity for site clearing, land reclamation, and mass earth pushing.',
                'description' => 'Engineered for tough Nigerian soil and sand filling projects. The CAT D8 provides unbeatable pushing power and ripper capability on large-scale infrastructure sites.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Comprehensive pre-lease technical vetting',
                'specs' => json_encode([
                    'Operating Weight' => 'Approx. 39,000 kg',
                    'Net Power' => '264 kW (354 hp)',
                    'Blade Type' => 'Semi-Universal (SU) with hydraulic tilt',
                    'Rear Attachment' => 'Single-shank or multi-shank ripper',
                    'Application' => 'Land reclamation, sand-filling leveling, heavy earth pushing',
                ]),
                'brand' => 'Caterpillar',
                'image' => '/images/equipment-yard-1.webp',
                'stock_qty' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $constEquipCat,
                'name' => 'Caterpillar 140G Motor Grader',
                'slug' => 'cat-140g-motor-grader',
                'sku' => 'KUT-EQP-CAT140G',
                'summary' => 'Precision motor grader for road sub-base preparation, road resurfacing, camber shaping, and bank sloping.',
                'description' => 'Dependable CAT 140G grader delivering accurate road grading and earth leveling for highway, access road, and industrial facility developments.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Fully operational with blade maintenance',
                'specs' => json_encode([
                    'Moldboard Width' => '3.66 m (12 ft)',
                    'Operating Weight' => 'Approx. 14,000 kg',
                    'Engine Power' => '112 kW (150 hp)',
                    'Application' => 'Highway grading, ditch-cutting, gravel road maintenance',
                ]),
                'brand' => 'Caterpillar',
                'image' => '/images/equipment-graders.webp',
                'stock_qty' => 4,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'category_id' => $constEquipCat,
                'name' => 'Caterpillar 950 Wheel Loader (Pay-Loader)',
                'slug' => 'cat-950-wheel-loader',
                'sku' => 'KUT-EQP-CAT950',
                'summary' => 'Heavy-duty wheel loader for aggregate handling, quarry loading, stockpile movement, and truck loading.',
                'description' => 'High-capacity wheel loader providing fast cycle times and strong breakout force. Ideal for construction material yards, asphalt plants, and sand sites.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Inspected and certified ready for deployment',
                'specs' => json_encode([
                    'Operating Weight' => 'Approx. 18,500 kg',
                    'Bucket Capacity' => '3.0 - 3.5 m³',
                    'Net Power' => '170 kW (228 hp)',
                    'Application' => 'Truck loading, stockpile handling, quarry aggregates',
                ]),
                'brand' => 'Caterpillar',
                'image' => '/images/equipment-loader-trucks.webp',
                'stock_qty' => 4,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $haulageCat,
                'name' => 'Low-Bed Heavy Haulage Trailer',
                'slug' => 'low-bed-heavy-haulage-trailer',
                'sku' => 'KUT-EQP-LOWBED',
                'summary' => 'Multi-axle heavy-duty low-bed trailer for plant mobilisation and heavy equipment transportation nationwide.',
                'description' => 'Dedicated equipment transport low-bed trailers suited for moving crawler excavators, bulldozers, piling rigs, and industrial machinery across Nigerian roads safely.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Comes with experienced heavy haulage drivers and escorts where required',
                'specs' => json_encode([
                    'Payload Capacity' => 'Up to 60 - 80 Tons',
                    'Deck Type' => 'Removable gooseneck / fixed low-deck with loading ramps',
                    'Axles' => '3 to 4 Heavy-Duty Axles',
                    'Application' => 'Heavy plant mobilisation, project-to-project machine relocations',
                ]),
                'brand' => 'Heavy Haulage',
                'image' => '/images/equipment-yard-2.webp',
                'stock_qty' => 5,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $haulageCat,
                'name' => '60 to 100-Ton Mobile Hydraulic Crane',
                'slug' => 'mobile-hydraulic-crane-60-100-ton',
                'sku' => 'KUT-EQP-CRANE100',
                'summary' => 'All-terrain and truck-mounted telescopic cranes for industrial lifting, structural erection, and pipe handling.',
                'description' => 'High-capacity telescopic mobile cranes offering superior reach and lifting charts. Ideal for pipeline lowering, steel structure erection, plant installation, and port cargo handling.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Certified lifting tackle and certified crane operator',
                'specs' => json_encode([
                    'Rated Capacity' => '60 - 100 Metric Tons',
                    'Boom Length' => 'Up to 50 m telescopic with jib extension',
                    'Outrigger Base' => 'Full hydraulic multi-position stabilization',
                    'Application' => 'Heavy industrial lifting, structural steel erection, vessel loading',
                ]),
                'brand' => 'Mobile Crane',
                'image' => '/images/project-pipe-laying.webp',
                'stock_qty' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $marineFleetCat,
                'name' => 'Offshore Sea-Going Tug Boat',
                'slug' => 'offshore-sea-going-tug-boat',
                'sku' => 'KUT-MAR-TUG',
                'summary' => 'High bollard-pull ocean-going tug boat for barge towing, rig moves, anchor handling, and maritime escort.',
                'description' => 'Built for challenging maritime towing and positioning. Features twin propulsion, robust towing winch, and full marine safety and communication gear.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Full marine certification and competent crew',
                'specs' => json_encode([
                    'Bollard Pull' => '40 - 65 Metric Tons',
                    'Engines' => 'Twin Marine Diesel Propulsion',
                    'Towing Gear' => 'Hydraulic Towing Winch & Stern Roller',
                    'Application' => 'Barge towing, offshore rig positioning, ship docking assistance',
                ]),
                'brand' => 'Marine Fleet',
                'image' => '/images/marine-tug.webp',
                'stock_qty' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $marineFleetCat,
                'name' => 'Offshore Supply Vessel (OSV)',
                'slug' => 'offshore-supply-vessel-osv',
                'sku' => 'KUT-MAR-OSV',
                'summary' => 'Large deck capacity offshore vessel for transporting drilling supplies, pipes, fuel, water, and deck cargo to offshore facilities.',
                'description' => 'Engineered for sustained offshore support operations. Large open deck space, high cargo deadweight, and advanced dynamic station keeping capabilities.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Class certified and maritime authority compliant',
                'specs' => json_encode([
                    'Deck Area' => 'Approx. 350 - 450 m²',
                    'Deadweight' => 'Up to 2,000 Metric Tons',
                    'Capacities' => 'Fuel oil, drill water, potable water and dry bulk',
                    'Application' => 'Offshore platform logistics, pipe transport, supply runs',
                ]),
                'brand' => 'Marine Fleet',
                'image' => '/images/marine-supply-vessel.webp',
                'stock_qty' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $marineFleetCat,
                'name' => 'Passenger Crew Transfer Boat',
                'slug' => 'passenger-crew-transfer-boat',
                'sku' => 'KUT-MAR-CREW',
                'summary' => 'High-speed aluminum hull passenger crew boat for fast, safe personnel transfers between shore bases and offshore installations.',
                'description' => 'Equipped with comfortable passenger seating, marine air-conditioning, certified life-saving appliances, and reinforced bow boarding fender.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Compliant with NIMASA and international safety standards',
                'specs' => json_encode([
                    'Passenger Capacity' => '30 - 60 Personnel',
                    'Service Speed' => '20 - 26 Knots',
                    'Hull Material' => 'Marine Grade High-Tensile Aluminum',
                    'Application' => 'Personnel shift changes, urgent offshore dispatch, survey transport',
                ]),
                'brand' => 'Marine Fleet',
                'image' => '/images/marine-crew-boat.webp',
                'stock_qty' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'category_id' => $marineFleetCat,
                'name' => 'Product Tanker Vessel',
                'slug' => 'product-tanker-vessel',
                'sku' => 'KUT-MAR-TANKER',
                'summary' => 'Double-hull clean petroleum product tanker vessel for coastal and deepwater product distribution.',
                'description' => 'Specialised coastal and regional petroleum transportation vessel, equipped with segregated ballast tanks and certified marine cargo monitoring.',
                'price' => 0,
                'requires_quote' => true,
                'installation_included' => false,
                'warranty_text' => 'Full class surveys and maritime clearances',
                'specs' => json_encode([
                    'Vessel Type' => 'Clean Petroleum Product Tanker (Double Hull)',
                    'Cargo Capacity' => 'Multi-grade segregated cargo tanks',
                    'Pumping Rate' => 'High discharge centrifugal cargo pumps',
                    'Application' => 'Coastal petroleum logistics, bunkering, maritime fuel transport',
                ]),
                'brand' => 'Marine Fleet',
                'image' => '/images/marine-tanker.webp',
                'stock_qty' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
        ];

        foreach ($equipment as $item) {
            DB::table('products')->insert(array_merge($item, [
                'type' => 'package',
                'compare_at_price' => 0,
                'price_label' => 'Lease on Request',
                'track_stock' => false,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
