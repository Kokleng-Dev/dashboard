<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_features')->delete();
        
        \DB::table('permission_features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'View',
                'permission_id' => '1',
                'active' => 1,
                'created_at' => '2023-03-14 09:16:47',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Create',
                'permission_id' => '1',
                'active' => 1,
                'created_at' => '2023-03-14 09:16:53',
                'updated_at' => NULL,
                'aleas' => 'create',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Edit',
                'permission_id' => '1',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:01',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Delete',
                'permission_id' => '1',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:07',
                'updated_at' => NULL,
                'aleas' => 'delete',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'View',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:20',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Create',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:23',
                'updated_at' => NULL,
                'aleas' => 'create',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Edit',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:27',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Delete',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:31',
                'updated_at' => NULL,
                'aleas' => 'delete',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'View',
                'permission_id' => '4',
                'active' => 1,
                'created_at' => '2023-03-14 09:17:55',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Edit',
                'permission_id' => '4',
                'active' => 1,
                'created_at' => '2023-03-14 09:18:14',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'View',
                'permission_id' => '5',
                'active' => 1,
                'created_at' => '2023-03-14 09:18:22',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Edit',
                'permission_id' => '5',
                'active' => 1,
                'created_at' => '2023-03-14 09:18:26',
                'updated_at' => '2023-03-14 09:20:45',
                'aleas' => 'edit',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'View',
                'permission_id' => '3',
                'active' => 1,
                'created_at' => '2023-03-14 09:21:22',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Create',
                'permission_id' => '3',
                'active' => 1,
                'created_at' => '2023-03-14 09:21:26',
                'updated_at' => NULL,
                'aleas' => 'create',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Edit',
                'permission_id' => '3',
                'active' => 1,
                'created_at' => '2023-03-14 09:21:29',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Delete',
                'permission_id' => '3',
                'active' => 1,
                'created_at' => '2023-03-14 09:21:35',
                'updated_at' => NULL,
                'aleas' => 'delete',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'View',
                'permission_id' => '7',
                'active' => 1,
                'created_at' => '2023-03-14 09:22:42',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Edit',
                'permission_id' => '7',
                'active' => 1,
                'created_at' => '2023-03-14 09:22:45',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'View',
                'permission_id' => '6',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:43',
                'updated_at' => NULL,
                'aleas' => 'view',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Create',
                'permission_id' => '6',
                'active' => 0,
                'created_at' => '2023-03-14 09:23:47',
                'updated_at' => '2023-03-15 00:38:57',
                'aleas' => 'create',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Edit',
                'permission_id' => '6',
                'active' => 1,
                'created_at' => '2023-03-14 09:23:50',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Delete',
                'permission_id' => '6',
                'active' => 0,
                'created_at' => '2023-03-14 09:23:53',
                'updated_at' => '2023-03-15 00:39:01',
                'aleas' => 'delete',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'View',
                'permission_id' => '8',
                'active' => 1,
                'created_at' => '2023-03-14 22:22:47',
                'updated_at' => '2023-03-14 22:22:58',
                'aleas' => 'view',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Create',
                'permission_id' => '8',
                'active' => 1,
                'created_at' => '2023-03-14 22:22:53',
                'updated_at' => NULL,
                'aleas' => 'create',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Edit',
                'permission_id' => '8',
                'active' => 1,
                'created_at' => '2023-03-14 22:23:11',
                'updated_at' => NULL,
                'aleas' => 'edit',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Delete',
                'permission_id' => '8',
                'active' => 1,
                'created_at' => '2023-03-14 22:23:16',
                'updated_at' => NULL,
                'aleas' => 'delete',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Permission',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-15 00:29:27',
                'updated_at' => NULL,
                'aleas' => 'permission',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Edit Permission',
                'permission_id' => '2',
                'active' => 1,
                'created_at' => '2023-03-15 00:29:52',
                'updated_at' => NULL,
                'aleas' => 'edit_permission',
            ),
        ));
        
        
    }
}