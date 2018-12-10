<?php

use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class, app()->environment('production') ? 2 : 50)->create()->each(function ($s) {
            $s->images()->saveMany(factory(Image::class, 10)->create());
        });
    }
}
