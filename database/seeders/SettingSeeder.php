<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [   'name' => 'name',
                'type'=>'string',
                'description'=>'اسم الموقع',
                'value'=>'لوحة التحكم',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'logo',
                'type'=>'file',
                'description'=>'لوجو',
                'value'=>'/uploads/settings/logo.png',
                'setting_group_id'=>'1'
            ],
            [   'name' => 'url',
                'type'=>'string',
                'description'=>'رابط الموقع',
                'value'=>'http://localhost:8000',
                'setting_group_id'=>'1'
            ],

            [   'name' => 'terms',
                'type'=>'textarea',
                'description'=>'شروط استخدام الموقع',
                'value'=>'<p>اكتب قواعد استخدام الموقع هنا....</p>',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'about_us',
                'type'=>'textarea',
                'description'=>'معلومات عنا',
                'value'=>'<p>نص عنا ...</p>',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'contact_us',
                'type'=>'textarea',
                'description'=>'اتصل بنا',
                'value'=>'<p>نص اتصل بنا...</p>',
                'setting_group_id'=>'3'
            ],
            [   'name' => 'email',
                'type'=>'string',
                'description'=>'البريد الالكتروني',
                'value'=>'support@site.com',
                'setting_group_id'=>'2'
            ],
            [   'name' => 'phone',
                'type'=>'string',
                'description'=>'رقم الهاتف',
                'value'=>'+2 011 55770000',
                'setting_group_id'=>'2'
            ],
        ];
        foreach ($settings as $setting)
        {
            Setting::create($setting);
        }
        //
    }
}
