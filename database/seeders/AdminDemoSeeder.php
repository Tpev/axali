<?php

// database/seeders/AdminDemoSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\{User, Customer, Deal, Project};

class AdminDemoSeeder extends Seeder
{
    public function run(): void
    {
        // admin user
        User::factory()->create([
            'name'      => 'Admin One',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('password'),
            'is_admin'  => true,
        ]);

        // 5 customers
        $customers = Customer::factory()->count(5)->create();

        // deals & projects
        foreach ($customers as $cust) {
            foreach (range(1,3) as $i) {
                $deal = Deal::create([
                    'customer_id' => $cust->id,
                    'name'        => $cust->company_name.' #'.$i,
                    'stage'       => Arr::random(['lead','quoted','active','closing','won','lost']),
                    'value_est'   => rand(20000,120000),
                    'owner_id'    => 1, // admin
                ]);

                Project::create([
                    'deal_id'          => $deal->id,
                    'code'             => 'AX-'.rand(2400,2600),
                    'stage'            => 'discovery',
                    'percent_complete' => rand(0,90),
                ]);
            }
        }
    }
}
