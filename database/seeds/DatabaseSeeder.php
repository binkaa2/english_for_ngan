<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   $data_univer = ['Hue University of science','Hue University of Foreign languages','Hue University of Economics'];
        foreach ($data_univer as $key => $value) {
            DB::table('universitys')->insert([
                'name' => $value
            ]);
        }
        $data_campus = ['Hue','Sai Gon','Ha Noi'];
        foreach ($data_campus as $key => $value) {
            DB::table('campus')->insert([
                'name' => $value
            ]);
        }
        $data_degree = ['Infomation Technology','Architecture','Biology'];
        foreach ($data_degree as $key => $value) {
            DB::table('degree')->insert([
                'name' => $value
            ]);
        }    
        for ($i=0; $i < 10; $i++) { 
            $gender = $i?'Male':'Female';
            $user_id = DB::table('users')->insertGetId([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '0974922032',
                'gender' => $gender,
                'campus_id'=> rand(1,3),
                'university_id'=> rand(1,3)
            ]);
            $gender = $i?'Male':'Female';
            DB::table('degree_of_user')->insert([
                'user_id'=>$user_id,
                'degree_id'=> rand(1,3)
            ]);
        }
        

        // $this->call(UsersTableSeeder::class);
    }
}
