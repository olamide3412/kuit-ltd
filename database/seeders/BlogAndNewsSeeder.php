<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogAndNewsSeeder extends Seeder
{
    /**
     * Run the database seeds for KUIT LIMITED Insights & Updates.
     */
    public function run(): void
    {
        $admin = User::first();
        $userId = $admin ? $admin->id : 1;

        BlogPost::truncate();
        News::truncate();

        $posts = [
            [
                'title' => 'Best Practices in Heavy Equipment Leasing: Maximising Uptime on Civil Construction Sites',
                'category' => 'Equipment Leasing',
                'cover_image' => '/images/equipment-excavator.webp',
                'excerpt' => 'How proactive machinery maintenance, certified operators, and proper equipment selection prevent costly downtime on earthmoving and road construction projects.',
                'body' => '<h3>Matching the Right Machine to Site Conditions</h3><p>Selecting the appropriate earthmoving machinery is critical to maintaining construction timelines. Whether utilising CAT 330 or CAT 320 hydraulic excavators for deep trenching or D8 bulldozers for sand-filling and site reclamation, matching machine specifications to soil mechanics prevents premature wear and structural strain.</p><h3>Routine Inspections and Scheduled Maintenance</h3><p>At KUIT LIMITED, leased equipment undergoes thorough multi-point mechanical inspections prior to dispatch. Daily fluid checks, hydraulic pressure audits, and track tension adjustments ensure that equipment operates reliably under rigorous field conditions.</p><h3>Dry Lease vs Wet Lease Considerations</h3><p>For organisations with their own trained technical operators, dry leases provide operational flexibility. Alternatively, wet leases include certified, experienced plant operators who understand equipment load limits, maximizing both productivity and on-site safety.</p>',
            ],
            [
                'title' => 'Marine Vessel Chartering in Nigeria: Safety Protocols and Operational Reliability',
                'category' => 'Marine Services',
                'cover_image' => '/images/marine-tanker.webp',
                'excerpt' => 'Navigating maritime logistics in Nigerian waterways with strict adherence to marine safety standards, qualified navigation personnel, and reliable vessel support.',
                'body' => '<h3>Ensuring Maritime Operational Integrity</h3><p>Offshore logistics and waterway transport require uncompromising adherence to safety and environmental standards. From ocean-going tug boats towing equipment barges to product tanker operations and fast passenger crew boats, reliable marine performance depends on vessel seaworthiness and certified seamanship.</p><h3>Vessel Maintenance and Technical Readiness</h3><p>Preventative maintenance schedules, propulsion system audits, and complete life-saving and firefighting appliance inspections are essential before any maritime voyage. Regular hull inspections and communications tests guarantee seamless coordination between vessel crews and shore management.</p>',
            ],
            [
                'title' => 'Pipeline Construction & Field E&I Support: Engineering for Energy Infrastructure',
                'category' => 'Engineering & Oilfield',
                'cover_image' => '/images/project-pipe-laying.webp',
                'excerpt' => 'Key considerations for pipeline welding, Robertshaw control panel servicing, well stimulation support, and environmental risk mitigation.',
                'body' => '<h3>High-Integrity Pipeline Laying and Welding</h3><p>Pipeline and flowline construction demands precision trenching, joint alignment, and radiographic-standard welding. Ensuring strict compliance with industry specifications protects assets against corrosion, pressure differentials, and environmental hazards.</p><h3>Electrical & Instrumentation (E&I) Reliability</h3><p>Control systems, such as Robertshaw pneumatic and electrical panels, serve as the primary safety barrier on production facilities. Routine calibration, sensor troubleshooting, and scheduled field device maintenance ensure production continuity and safe automated shutdowns when anomalies occur.</p>',
            ],
            [
                'title' => 'Cloud Migration & Application Development: Modernising Enterprise Workflows',
                'category' => 'IT Services',
                'cover_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'How secure cloud infrastructure, automated backups, and purpose-built software applications drive operational efficiency for modern enterprises.',
                'body' => '<h3>Transitioning from Manual Processes to Custom Software</h3><p>Modern enterprises require real-time visibility into inventory, equipment tracking, and operational reporting. Purpose-built web and mobile applications streamline administrative workflows, minimize human error, and accelerate decision-making.</p><h3>Secure Cloud Architecture and Business Continuity</h3><p>Protecting critical corporate data through redundant cloud storage and automated backup pipelines ensures business continuity. Scalable cloud architectures allow businesses to expand operations without investing in expensive, fragile on-premise hardware.</p>',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create([
                'user_id' => $userId,
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'category' => $post['category'],
                'cover_image' => $post['cover_image'],
                'excerpt' => $post['excerpt'],
                'body' => $post['body'],
                'status' => 'published',
                'read_time' => 4,
                'published_at' => now(),
            ]);
        }
    }
}
