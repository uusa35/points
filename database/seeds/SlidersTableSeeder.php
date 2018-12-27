<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Slider::class,app()->environment('production') ? 2 : 15)->create();
    }
}
