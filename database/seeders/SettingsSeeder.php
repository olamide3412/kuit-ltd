<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'company_name' => 'KUIT LIMITED',
            'rc_number' => 'RC 806865',
            'incorporated' => '16 March 2009',
            'tagline' => 'Marine | Construction | Engineering Services',
            'phone' => '(+234) 803 280 2038',
            'secondary_phone' => '(+234) 703 344 2821',
            'phone_whatsapp' => '2348032802038',
            'whatsapp' => '+2348032802038',
            'email' => 'info@kuitltd.com',
            'secondary_email' => 'kuitlimited@yahoo.com',
            'website' => 'https://kuitltd.com',
            'domain' => 'kuitltd.com',
            'address' => '132, Airport Road, Effurun-Warri, Delta State, Nigeria',
            'headquarters' => '132, Airport Road, Effurun-Warri, Delta State',
            'coverage_scope' => 'Effurun-Warri, Delta State & Nationwide Operations',
            'hours' => 'Mon – Sat: 8:00 AM – 5:00 PM',
            'bank_name' => 'First Bank of Nigeria',
            'bank_account_name' => 'KUIT LIMITED',
            'bank_account_number' => '',
            'vat_percent' => '7.5',
            'enable_company_profile_download' => 'true',
            'company_profile_url' => '/docs/kuit-limited-company-profile.pdf',
            'hero_slides' => json_encode([
                ['type' => 'link', 'value' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186156f?q=80&w=2070&auto=format&fit=crop'],
                ['type' => 'link', 'value' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2069&auto=format&fit=crop'],
                ['type' => 'link', 'value' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop'],
                ['type' => 'link', 'value' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2069&auto=format&fit=crop'],
            ]),
            'hero_title' => 'Marine, Construction and Engineering Services You Can Rely On.',
            'hero_subtitle' => 'KUIT LIMITED delivers equipment leasing, marine services, engineering and oil & gas support across Nigeria, and now technology solutions for modern businesses.',
        ];

        foreach ($settings as $key => $val) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                [
                    'value' => $val,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
