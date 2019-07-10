<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // DB::table('categories')->ALTER TABLE table_name AUTO_INCREMENT = 1;

      DB::table('categories')->insert([
            'name' => "PLANTA",
        ]);

        DB::table('categories')->insert([
              'name' => "ESQUEJE",
          ]);

          DB::table('categories')->insert([
                'name' => "SEMILLAS",
            ]);

            DB::table('categories')->insert([
                  'name' => "PRODUCTO",
              ]);

              DB::table('categories')->insert([
                    'name' => "SERVICIO",
                ]);
    }
}
