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
         $this->call(SettingsTableSeeder::class);
         $this->call(SlidersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PrivilegesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PaymentPlansTableSeeder::class);
    }
}
