<?php

namespace Database\Seeders;

use App\Models\SettingGroup;
use Illuminate\Database\Seeder;

class SettingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'موقع الكتروني',
            'معلومات عنا',
            'اتصل بنا',
            'SEO',
        ];
        foreach ($groups as $group)
        {
            SettingGroup::create([
                'name' => $group
            ]);
        }
    }
}
