<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //INSERTAR USERS
      DB::table('users')->insert([
          'name' => "Sarai",
          'email' => "sarai@gmail.com",
          'email_verified_at' => null,
          'password' => Hash::make('12345'),
          'remember_token' => null,
          'created_at' => null,
          'updated_at' => null,
          'username' => 'sarai',
          'avatar' => '2.png',
          'calification' => null
        ]);

        DB::table('users')->insert([
        'name' => "Ana",
        'email' => "ana@gmail.com",
        'email_verified_at' => null,
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => null,
        'username' => 'ana',
        'avatar' => '3.png',
        'calification' => null
      ]);

      DB::table('users')->insert([
        'name' => "ultima",
        'email' => "ultima@gmail.com",
        'email_verified_at' => null,
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => null,
        'username' => 'ultima',
        'avatar' => '3.png',
        'calification' => null
       ]);

      //INSERTAR ARTICULOS
            DB::table('articles')->insert([
              'name' => 'Cedrón del monte',
              'nomenclature' => 'Aloysia gratissima',
              'image1' => 'img-04.jpg',
              'image2' => 'img-05.jpg',
              'image3' => 'img-06.jpg',
              'description'=> 'Arbusto aromático, ramoso, de 1 a 3 metros de altura. Flores con aroma muy dulce, parecido al jazmín, que atraen mariposas. También es elegido por las aves para anidar.',
              'status' => 'on',
              'user_id' => '1',
              'category_id' => '1'
            ]);
            DB::table('articles')->insert([
              'name' => 'Sangre de toro',
              'nomenclature' => 'Rivina humilis',
              'image1' => 'img-11.jpg',
              'image2' => null,
              'image3' => 'img-06.jpg',
              'description'=> 'Flores blancas y frutos rojos que son el alimento para varias aves. No necesita mucho sol ni riego.',
              'status' => 'on',
              'user_id' => '1',
              'category_id' => '1'
            ]);
            DB::table('articles')->insert([
              'name' => 'Laurel',
              'nomenclature' => 'Laurus nobilis',
              'image1' => 'img-07.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Hermosa planta, coseché sus hojas varias veces, pero me mudé y no tengo más lugar.',
              'status' => 'on',
              'user_id' => '1',
              'category_id' => '2'
            ]);
            DB::table('articles')->insert([
              'name' => 'Salvia azul',
              'nomenclature' => 'Salvia guaranitica',
              'image1' => 'img-10.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Crece muy rápido y da unas hermosas flores azules. Necesita sol.',
              'status' => 'on',
              'user_id' => '1',
              'category_id' => '2'
            ]);

            DB::table('articles')->insert([
              'name' => 'Fumo bravo',
              'nomenclature' => 'Solanum granulosum-leprosum',
              'image1' => 'img-19.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Es un arbolito. Ideal para plantar en un jardín amplio. Atrae aves.',
              'status' => 'on',
              'user_id' => '2',
              'category_id' => '3'
            ]);
            DB::table('articles')->insert([
              'name' => 'Semillas de albahaca',
              'nomenclature' => 'Ocimum basilicum',
              'image1' => 'img-10.jpg',
              'image2' => 'img-10.jpg',
              'image3' => null,
              'description'=> 'Semillas de albahaca para la huerta.',
              'status' => 'on',
              'user_id' => '2',
              'category_id' => '3'
            ]);
            DB::table('articles')->insert([
              'name' => 'Kit de jardinería',
              'nomenclature' => null,
              'image1' => 'img-15.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Muy poco uso, en perfecto estado y super práctico!',
              'status' => 'on',
              'user_id' => '2',
              'category_id' => '4'
            ]);
            DB::table('articles')->insert([
              'name' => 'Sauco',
              'nomenclature' => 'Sambucus australis',
              'image1' => 'img-21.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Arbusto frondoso, las frutas atraen a las aves. Se recomienda plantarlo directamente en tierra o en un cantero grande.',
              'status' => 'on',
              'user_id' => '2',
              'category_id' => '3'
            ]);

            DB::table('articles')->insert([
              'name' => 'Yerba mate',
              'nomenclature' => 'Ilex paraguariensis',
              'image1' => 'img-16.jpg',
              'image2' => 'img-17.jpg',
              'image3' => null,
              'description'=> 'Traje estas semillas de un viaje, nunca las germiné, pero deberían funcionar. Ojo: no son fáciles de germinar!',
              'status' => 'on',
              'user_id' => '3',
              'category_id' => '3'
            ]);
            DB::table('articles')->insert([
              'name' => 'Lavanda',
              'nomenclature' => 'Lavandula dentala',
              'image1' => 'img-18.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Tengo tres plantines disponibles.',
              'status' => 'on',
              'user_id' => '3',
              'category_id' => '1'
            ]);
            DB::table('articles')->insert([
              'name' => 'Malva rosa',
              'nomenclature' => 'Pavonia hastata',
              'image1' => 'img-20.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Hermosas plantas con unas flores rosas muy lindas! Da flores casi todo el año.',
              'status' => 'on',
              'user_id' => '3',
              'category_id' => '1'
            ]);
            DB::table('articles')->insert([
              'name' => 'Suculentas varias',
              'nomenclature' => ' ',
              'image1' => 'img-12.jpg',
              'image2' => null,
              'image3' => null,
              'description'=> 'Suculentas variadas, son todas chiquitas. No necesitan mucho sol, sí mucha luz. Poco riego. Ideal para interiores.',
              'status' => 'on',
              'user_id' => '3',
              'category_id' => '1'
            ]);


        // $this->call(UsersTableSeeder::class);
    }
}
