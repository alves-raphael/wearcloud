<?php

namespace Database\Seeders;

use App\Models\Apparel;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApparelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::factory()->create();
        Apparel::factory()->count(300)->create(['company_id' => $company->id]);
    }
}
