<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('produtos_categorias')->insert([
                'descricao' => "test-".Str::random(10),
                'idCategoriaPai' => rand(1, 1000),
            ]);
        }
    }
}
