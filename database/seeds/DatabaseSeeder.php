<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
