<?php

use App\Models\Comment;
use App\Models\File;
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
            $job = factory(Job::class)->create();
            $o->images()->saveMany(factory(Image::class, 3)->create());
            $o->files()->saveMany(factory(File::class, 3)->create());
            $o->job()->save($job);
            $job->designers()->onlyDesigners()->saveMany(User::onlyDesigners()->get()->random()->take(2));
            $job->comments()->saveMany(factory(Comment::class,10)->create());
            $job->images()->saveMany(factory(Image::class,10)->create());
            $job->files()->saveMany(factory(File::class,10)->create());
            $job->versions()->saveMany(factory(Version::class, 3)->create()->each(function ($v) {
                $v->images()->saveMany(factory(Image::class, 3)->create());
                $v->files()->saveMany(factory(File::class, 3)->create());
                $v->comments()->saveMany(factory(Comment::class, 5)->create());
            }));
        });
    }
}
