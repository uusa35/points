<?php

use App\Models\Balance;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, app()->environment('production') ? 4 : 120)->create()->each(function ($user) {
            if ($user->id === 1) {
                $user->update(['role_id' => Role::where('name', 'super')->first()->id]);
            }
            $user->balance()->save(factory(Balance::class)->create());
        });
    }
}
