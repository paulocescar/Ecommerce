<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 1000; $i++){
            $timestamp = time() + mt_rand(0, 86400);
            $datetime = \DateTime::createFromFormat('U', $timestamp);
            DB::table('clients')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'cpf' => mt_rand(10000000000, 99999999999),
                'birthday' => $datetime,
                'address_id' => 1,
            ]);
        }
    }
}
