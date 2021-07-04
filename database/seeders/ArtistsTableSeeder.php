<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::truncate();

        $artists = [ 
            ['name'=>'Adele'],
            ['name'=>'Beyoncé'],
            ['name'=>'Chris Brown'],
            ['name'=>'David Bowie'],
            ['name'=>'Guns n Roses'],
            ['name'=>'Hanson'],
            ['name'=>'Jessie J'],
            ['name'=>'Kate Perry'],
            ['name'=>'Mariah Carrey'],
            ['name'=>'Madonna'],
            ['name'=>'Nickelback'],
            ['name'=>'One Direction'],
            ['name'=>'Papa Roach'],
            ['name'=>'Rammstein'],
            ['name'=>'Beyoncé'],
            ['name'=>'Rihanna'],
            ['name'=>'Evanescence'],
            ['name'=>'Shakira'],
            ['name'=>'Kelly Clarkson'],
            ['name'=>'Usher'],
            ['name'=>'Justin Bieber'],
            ['name'=>'Vitas'],
            ['name'=>'Michael Jackson'],
            ['name'=>'Will.i.am'],
            ['name'=>'Shania Twain'],
            ['name'=>'Json Mraz'],
            ['name'=>'The Beatles'],
            ['name'=>'Adele'],
            ['name'=>'50 cent'],
        ];

        Artist::insert($artists);
    }
}
