<?php

use App\Wapschool\Palestra;
use Illuminate\Database\Seeder;

class PalestraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('palestra')->insert([
        'nome'   => 'Desenvolvendo aplicações WEB com Laravel',
        'evento' => 'Wapschool'
      ]);

      factory(Palestra::class,100)->create();
    }
}
