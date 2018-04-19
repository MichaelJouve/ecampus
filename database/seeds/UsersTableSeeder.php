<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            \Illuminate\Support\Facades\DB::table('users')->insert([
                "name" => "Romaric$i",
                "firstname" => "Gro$i",
                "email" => "romaric$i@mail.com",
                "password" => bcrypt('11110000')


            ]);
        }
    }
}
