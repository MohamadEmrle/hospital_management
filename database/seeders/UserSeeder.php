<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name_en' => 'general',
                'name_ar' => 'المدير العام',
                'type_id' => '1',
                'email'=>'admin@gmail.com',
                'password'=>'12345678'
            ],
            [
                'name_en' => 'admin',
                'name_ar' => 'المدير',
                'type_id' => '2',
                'email'=>'admin@site.com',
                'password'=>'12345678'
            ],
            [
                'name_en' => 'user',
                'name_ar' => 'المستخدم',
                'type_id' => '3',
                'email'=>'user@site.com',
                'password'=>'12345678'
            ],
        ];
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
