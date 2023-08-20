<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'permission_id' => 1,
                'permission_feature_id' => '["1","2","3","4"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:00',
                'updated_at' => '2023-03-14 09:23:20',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'permission_id' => 2,
                'permission_feature_id' => '["5","7","8","6","27","28"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:01',
                'updated_at' => '2023-03-15 00:30:05',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'permission_id' => 3,
                'permission_feature_id' => '["13","14","16","15"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:03',
                'updated_at' => '2023-03-14 09:23:26',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'permission_id' => 4,
                'permission_feature_id' => '["9","10"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:05',
                'updated_at' => '2023-03-14 09:23:28',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 1,
                'permission_id' => 5,
                'permission_feature_id' => '["11","12"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:07',
                'updated_at' => '2023-03-14 09:23:29',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 1,
                'permission_id' => 7,
                'permission_feature_id' => '["17","18"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:09',
                'updated_at' => '2023-03-14 09:23:31',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 1,
                'permission_id' => 6,
                'permission_feature_id' => '["19","21"]',
                'active' => 1,
                'created_at' => '2023-03-14 09:24:01',
                'updated_at' => '2023-03-15 00:41:01',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'permission_id' => 2,
                'permission_feature_id' => '["5","8","7","6","27","28"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:42',
                'updated_at' => '2023-03-15 00:31:11',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 2,
                'permission_id' => 3,
                'permission_feature_id' => '[]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:43',
                'updated_at' => '2023-03-14 23:55:13',
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 2,
                'permission_id' => 4,
                'permission_feature_id' => '["9","10"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:45',
                'updated_at' => '2023-03-14 22:21:58',
            ),
            10 => 
            array (
                'id' => 11,
                'role_id' => 2,
                'permission_id' => 5,
                'permission_feature_id' => '["11","12"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:46',
                'updated_at' => '2023-03-15 00:41:13',
            ),
            11 => 
            array (
                'id' => 12,
                'role_id' => 2,
                'permission_id' => 6,
                'permission_feature_id' => '["19","21"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:48',
                'updated_at' => '2023-03-15 00:40:34',
            ),
            12 => 
            array (
                'id' => 13,
                'role_id' => 2,
                'permission_id' => 7,
                'permission_feature_id' => '["17","18"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:21:50',
                'updated_at' => '2023-03-14 22:22:03',
            ),
            13 => 
            array (
                'id' => 14,
                'role_id' => 2,
                'permission_id' => 8,
                'permission_feature_id' => '["23","24","25","26"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:23:36',
                'updated_at' => '2023-03-14 22:23:42',
            ),
            14 => 
            array (
                'id' => 15,
                'role_id' => 1,
                'permission_id' => 8,
                'permission_feature_id' => '["23","24","25","26"]',
                'active' => 1,
                'created_at' => '2023-03-14 22:24:29',
                'updated_at' => '2023-03-14 22:24:36',
            ),
        ));
        
        
    }
}