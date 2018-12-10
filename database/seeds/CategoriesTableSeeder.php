<?php

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, app()->environment('production') ? 2 : 4)->create(['parent_id' => 0])->each(function ($c) {
            // children
            $childOne = factory(Category::class)->create(['parent_id' => $c->id]);
            $childTow = factory(Category::class)->create(['parent_id' => $c->id]);
            $c->children()->saveMany([$childOne, $childTow]);
            $c->images()->saveMany(factory(Image::class, 2)->create());
            $childOne->images()->saveMany(factory(Image::class, 2)->create());
            $childTow->images()->saveMany(factory(Image::class, 2)->create());
            // children of children
            $childOne->children()->saveMany(factory(Category::class, 2)->create(['parent_id' => $childOne->id]));
            $childTow->children()->saveMany(factory(Category::class, 2)->create(['parent_id' => $childTow->id]));
        });
    }
}
