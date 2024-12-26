<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'Google Company.',
                'type' => 'Public',
                'address' => '1600 Amphitheatre Parkway, Mountain View, CA 94043 USA.',
                'net_worth' => 10200000000
            ],
            [
                'name' => 'Microsoft Company.',
                'type' => 'Private',
                'address' => 'One Microsoft Way Redmond, WA 98052 USA',
                'net_worth' => 20300000000
            ],
            [
                'name' => 'Facebook Company',
                'type' => 'Public',
                'address' => '1 Hacker Way Menlo Park, CA 94025 United States',
                'net_worth' => 32000000000
            ],
            [
                'name' => 'Computer Company',
                'type' => 'Private',
                'address' => 'Cebu City',
                'net_worth' => 25000000
            ],
            [
                'name' => 'IT Company',
                'type' => 'Public',
                'address' => 'Tubigon, Bohol',
                'net_worth' => 42000000
            ]
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
