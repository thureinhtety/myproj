<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thu',
            'email' => 'thu@gmail.com',
            'password' => bcrypt('11111111A'),
            'profile' => '/storage/images/i1.png',
            'phone' => '123456',
            'address' => 'Yangon',
            'dob' => '2020-12-01',
            'create_user_id' => 1,
            'updated_user_id' => 1,
        ]);
    }
}
