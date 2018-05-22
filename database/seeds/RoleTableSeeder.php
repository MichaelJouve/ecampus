<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_writer = new Role();
        $role_writer->name = 'writer';
        $role_writer->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'superAdmin';
        $role_admin->save();
    }
}
