<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'name'     => 'IT Openhouse 2017',
            'email'    => 'openhouse@it.kmitl.ac.th',
            'password' => Hash::make('ITOPH#2017'),
        ));
    }
}
