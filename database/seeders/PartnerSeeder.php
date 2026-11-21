<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds for Clients We Have Served / Track Record.
     * Note: Names are stored as plain text per brand guidelines (no unlicensed logos).
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Nigerian National Petroleum Company (NNPC)',
                'description' => 'Energy sector contracting, pipeline works and engineering support services.',
                'website_url' => null,
                'logo_url' => null,
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'name' => 'Nigerian Petroleum Development Company (NPDC)',
                'description' => 'Upstream exploration, well services, instrumentation and field engineering.',
                'website_url' => null,
                'logo_url' => null,
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'name' => 'Century Exploration and Production Limited (CEPL)',
                'description' => 'Offshore marine services and energy infrastructure support.',
                'website_url' => null,
                'logo_url' => null,
                'status' => 'active',
                'sort_order' => 3,
            ],
            [
                'name' => 'Federal & State Infrastructure Departments',
                'description' => 'Civil engineering, road and bridge construction, and heavy equipment leasing.',
                'website_url' => null,
                'logo_url' => null,
                'status' => 'active',
                'sort_order' => 4,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(['name' => $partner['name']], $partner);
        }
    }
}
