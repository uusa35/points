<?php

use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = ['users', 'roles', 'privileges','categories', 'sliders', 'orders', 'jobs', 'versions', 'payments', 'transactions', 'balances', 'files', 'settings'];
        foreach ($table as $k => $v) {
            $privilege = factory(Privilege::class)->create(['module_name' => $v]);
            $privilege->roles()->saveMany(Role::get()->shuffle()->take(5));
        }
    }
}
