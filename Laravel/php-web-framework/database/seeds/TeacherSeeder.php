<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 100; $i++)
        {
            $name = Str::random(6);
            DB::table('teachers')->insert([
                'name' => $name,
                'email' => $name.'@gmail.com',
                'age' => random_int(20, 100),
            ]);
        }
        
    }
}
