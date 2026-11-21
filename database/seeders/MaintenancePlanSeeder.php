<?php

namespace Database\Seeders;

use App\Models\MaintenancePlan;
use App\Models\Service;
use Illuminate\Database\Seeder;

class MaintenancePlanSeeder extends Seeder
{
    public function run(): void
    {
        MaintenancePlan::truncate();

        $equipmentService = Service::where('slug', 'heavy-equipment-leasing')->first();
        $oilGasService = Service::where('slug', 'oil-gas-field-support')->first();
        $itService = Service::where('slug', 'it-services-cloud-development')->first();
        $marineService = Service::where('slug', 'marine-services-fleet')->first();

        $plans = [
            [
                'name' => 'Heavy Equipment Routine Preventive Maintenance SLA',
                'slug' => 'heavy-equipment-preventive-maintenance-sla',
                'service_id' => $equipmentService?->id,
                'description' => 'Scheduled quarterly mechanical servicing, hydraulic oil diagnostic, filter replacements, and priority on-site certified mechanic dispatch for leased and client-owned earthmoving plant.',
                'price' => 75000000, // ₦750,000.00 / quarter
                'billing_period' => 'quarterly',
                'visits_per_year' => 4,
                'inclusions' => [
                    'Comprehensive engine oil, lube filter & fuel separator replacement',
                    'Hydraulic pump pressure testing & cylinder seal leak audit',
                    'Track tensioning, pin bushing & undercarriage wear inspection',
                    'Cooling radiator flush, belt tension check & battery test',
                    '24/7 priority emergency mobile field mechanic dispatch',
                    'Full diagnostic health report & plant uptime log',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Wellhead Safety Instrumentation & Valve Overhaul SLA',
                'slug' => 'wellhead-safety-instrumentation-valve-overhaul-sla',
                'service_id' => $oilGasService?->id,
                'description' => 'Bi-annual offshore and swamp wellhead pneumatic safety shutdown panel maintenance, sensor recalibration, valve seat lapping, and statutory safety recertification.',
                'price' => 185000000, // ₦1,850,000.00 / bi-annually
                'billing_period' => 'bi-annually',
                'visits_per_year' => 2,
                'inclusions' => [
                    'Robertshaw pneumatic safety shutdown panel functional audit',
                    'Pneumatic sensor recalibration & pilot valve rebuild',
                    'Pressure Safety Valve (PSV) pop-test calibration & recertification',
                    'Surface flowline choke & gate valve lapping & seal greasing',
                    'High/Low pressure emergency trip point verification',
                    'NUPRC/DPR-compliant inspection log & certificate of integrity',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Enterprise IT Infrastructure & Cybersecurity Support SLA',
                'slug' => 'enterprise-it-infrastructure-cybersecurity-support-sla',
                'service_id' => $itService?->id,
                'description' => 'Annual corporate IT management covering 24/7 server monitoring, structured network upkeep, firewall management, daily automated cloud backups, and disaster recovery.',
                'price' => 360000000, // ₦3,600,000.00 / year
                'billing_period' => 'annually',
                'visits_per_year' => 12,
                'inclusions' => [
                    '24/7 proactive cloud server & uptime vulnerability monitoring',
                    'Daily automated off-site encrypted database & file backups',
                    'Enterprise firewall security, VPN tunnel & routing optimization',
                    'Structured fiber optic cabling & Wi-Fi 6 access point audit',
                    'Priority 4-hour on-site engineer dispatch for critical incidents',
                    'Quarterly executive IT performance & security compliance report',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Marine Vessel Auxiliary & Quayside Servicing Agreement',
                'slug' => 'marine-vessel-auxiliary-quayside-servicing-agreement',
                'service_id' => $marineService?->id,
                'description' => 'Routine quayside auxiliary generator servicing, bilge and transfer pump inspection, marine electrical system audit, and safety gear recertification for coastal vessels.',
                'price' => 120000000, // ₦1,200,000.00 / bi-annually
                'billing_period' => 'bi-annually',
                'visits_per_year' => 2,
                'inclusions' => [
                    'Marine auxiliary diesel generator service & filter renewal',
                    'Bilge, ballast & cargo fuel transfer pump pressure diagnostics',
                    'Marine electrical switchboard insulation & earth fault audit',
                    'Navigation radar, VHF radio & GPS communication health check',
                    'On-board life-saving & firefighting equipment readiness survey',
                    'Quayside emergency technical assistance support guarantee',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($plans as $plan) {
            MaintenancePlan::create($plan);
        }
    }
}

