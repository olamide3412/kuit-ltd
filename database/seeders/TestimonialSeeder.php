<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Note: Per KUIT brand guidelines, no fabricated testimonials are seeded.
     * Real client testimonials will be added when supplied and verified by the client.
     */
    public function run(): void
    {
        Testimony::truncate();
    }
}
