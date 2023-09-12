<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'Admin',
                'المديرين'
            ],
            [
                'Category',
                'التصنيفات'
            ],
            [
                'User',
                'المستخدمين'
            ],
            [
                'Setting',
                'الاعدادات'
            ]
        ];
        foreach ($permissions as $permission)
        {
            Permission::create([
                'name' => $permission[0],
                'english_name' => $permission[0],
                'persian_name' => $permission[1]
            ]);
        }
    }
}
