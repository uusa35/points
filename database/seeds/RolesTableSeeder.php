<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['super', 'admin', 'client', 'designer'];
        foreach ($roles as $k => $v) {
            $role = factory(Role::class)->create(['name' => $v]);
            if ($role->name === 'super') {
                $role->update(['is_super' => $v === 'super' ? 1 : 0, 'is_visible' => false, 'is_admin' => true]);
            } else if ($role->name === 'admin') {
                $role->update(['is_admin' => $v === 'admin' ? 1 : 0, 'is_visible' => false, 'is_super' => false]);
            } else if ($role->name === 'designer') {
                $role->update(['is_admin' => $v === 'admin' ? 1 : 0, 'is_visible' => true, 'is_super' => false, 'is_admin' => false, 'is_designer' => true]);
            }
        }
    }
}
