<?php

namespace Database\Seeders;

use App\Models\User_data;
use App\Models\Comments;
use App\Models\Specifics;
use App\Models\Flowers;
use App\Models\Submissions;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'is_admin'=>'1',
            'password' => \Hash::make('admin')
        ]);

        $user = User_data::create([
            'username' => 'Bob',
            'email' => 'bob@gmail.com'
        ]);
        $user = User_data::create([
            'username' => 'Jhon',
            'email' => 'jhon@gmail.com'
        ]);
        $user = User_data::create([
            'username' => 'Maria',
            'email' => 'maria@gmail.com'
        ]);

        $specifics = Specifics::create([
            'species' => 'Hibiscus rosa-sinensis',
            'color' => 'Pink',
            'bloom_season' => 'Early spring to late autumn',
            'lenght_mm' => '2000'
        ]);
        $flower = new Flowers();
		$flower->name = 'China rose';
		$specifics = Specifics::where('species', 'Hibiscus rosa-sinensis')->first();
		$specifics->flowers()->save($flower);


        $specifics = Specifics::create([
            'species' => 'Lilium lancifolium',
            'color' => 'Orange',
            'bloom_season' => 'Mid to late summer',
            'lenght_mm' => '1000'
        ]);
        $flower = new Flowers();
		$flower->name = 'Tiger lily';
		$specifics = Specifics::where('species', 'Lilium lancifolium')->first();
		$specifics->flowers()->save($flower);


        $specifics = Specifics::create([
            'species' => 'Bellis perennis',
            'color' => 'White',
            'bloom_season' => 'Between April and June',
            'lenght_mm' => '228',
            'other' => 'English daisy'
        ]);
        $flower = new Flowers();
		$flower->name = 'Common daisy';
		$specifics = Specifics::where('species', 'Bellis perennis')->first();
		$specifics->flowers()->save($flower);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
