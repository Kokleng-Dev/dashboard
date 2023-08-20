<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Developer',
                'username' => 'root',
                'password' => '$2y$10$ro2hhN618DZkOxqHLVqb6ug.C/xExVZnhjArhRI.m79Dhs6.iW8pG',
                'phone' => '016855002',
                'photo' => 'photos/profile/uGhXuET9i6HdjmRnDn0LpVgKkiqehpUl6AA00Lmb.jpg',
                'language' => 'kh',
                'role_id' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'active' => 1,
                'created_at' => '2023-03-09 18:06:08',
                'updated_at' => '2023-03-14 15:53:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Default Admin',
                'username' => 'admin',
                'password' => '$2y$10$0RC6pl8hgNlTNNs.fMn3g.BOmrmY2Q5MDX8nLJVZ2jPj1v1z08H6O',
                'phone' => '016855002',
                'photo' => 'photos/profile/GKQ1wlMlLFQobCFzmCXErv3wJA7uOoNqzP6UuDZ5.jpg',
                'language' => 'kh',
                'role_id' => 2,
                'created_by' => NULL,
                'updated_by' => NULL,
                'active' => 1,
                'created_at' => '2023-03-14 15:50:25',
                'updated_at' => '2023-03-14 16:31:03',
            ),
        ));
        
        
    }
}