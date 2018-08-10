<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            [
                'name' => 'Gustavo Weissmann',
                'email' => 'gnweissmann@gmail.com',
                'password' => bcrypt('A841j936'),
            ],
            [
                'name' => 'Gustavo Dias',
                'email' => 'guudiaass@gmail.com',
                'password' => bcrypt('gudias'),
            ]
        ]);
    }
}
