<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Default System',
                'logo' => 'photos/companies/LrGEsVZKuOCupa6rHLKIaGyCZYTQC3ab3yjlQYLt.png',
                'email' => 'yoskoklendev@gmail.com',
                'telegram' => '016855002',
                'youtube' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'phone' => '016855002',
                'address' => NULL,
                'description' => NULL,
                'active' => 1,
                'created_at' => '2023-03-11 13:59:55',
                'updated_at' => '2023-03-12 22:14:35',
            ),
        ));
        
        
    }
}