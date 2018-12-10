<?php

use App\Models\Gallery;
use App\Models\Image;
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
                $user->galleries()->saveMany(factory(Gallery::class, 3)->create()->each(function ($g) {
                    return $g->images()->saveMany(factory(Image::class, 10)->create());
                }));
            }
        });
    }
}
