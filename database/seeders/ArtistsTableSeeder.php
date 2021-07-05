<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
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
            ['name'=>'50 cent'],
        ];

        Artist::insert($artists);
    }
}
