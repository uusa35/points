<?php

use App\Models\Image;
use App\Models\Job;
use App\Models\Order;
use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, app()->environment('production') ? 2 : 200)->create()->each(function ($o) {
//            $job = factory(Job::class,1)->create();
//            dd($job);
            $o->images()->saveMany(factory(Image::class, 3)->create());
//            $o->jobs()->save($job);
//            $job->designers()->saveMany(User::designers()->random()->take(2));
//            $job->versions()->saveMany(factory(Version::class, 3)->create()->each(function ($v) {
//                $v->images()->saveMany(factory(Image::class, 3)->create());
//            }));
        });
    }
}
