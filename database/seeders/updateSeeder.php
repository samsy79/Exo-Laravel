<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Etudiant;

class updateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
   $blogs = Etudiant::whereNull('user_id')->update(['user_id'=>3]);
    }
}
