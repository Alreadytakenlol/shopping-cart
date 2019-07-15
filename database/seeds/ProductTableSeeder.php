<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath'=>'https://imgs.gvm.com.tw/upload/gallery/20190621/66852_11.jpg',
            'title'=> 'Hoody',
            'description'=>'Hoody is here~!!',
            'price'=>15
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=>'https://i.ytimg.com/vi/fKopy74weus/maxresdefault.jpg',
            'title'=> 'ImagineDragon Thunder',
            'description'=>'Thun-thun-thunder, thunder, thunder',
            'price'=>18
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=>'https://i.pinimg.com/originals/60/5c/29/605c292fdd10a85e19b98c9f9c083327.jpg',
            'title'=> 'Arc-North Mean to be',
            'description'=>'That we are meant to be We are, we are ',
            'price'=>20
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=>'https://i.ytimg.com/vi/pXRviuL6vMY/hqdefault.jpg',
            'title'=> 'Stress Out',
            'description'=>"Wish we could turn back time, to the good old days",
            'price'=>21
        ]);
        $product->save();
    }
}
