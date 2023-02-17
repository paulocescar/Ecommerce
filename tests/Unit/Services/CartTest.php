<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

class CartTest extends TestCase
{

    /**
     * Testa se a rota exige autenticação.
     *
     * @return void
     */
    public function testUnauthorized()
    {
        $response = $this->get('/api/carrinhos');
        $response->assertStatus(302);
    }


    /**
     * A basic unit test get.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->withHeader('Authorization', $this->bearer)->get('/api/carrinhos');
        $response->assertStatus(200);
    }

    /**
     * A basic unit test create cart.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                    ->post('/api/carrinhos',[
                        "user_id"=>1,
                        "produto_id"=>107,
                        "preco"=>55.90,
                        "quantidade"=>1
                    ]);
        $response->assertStatus(200);
    }

    /**
     * A basic unit test get by user id.
     *
     * @return void
     */
    public function testGetByUserId()
    {
        $response = $this->withHeader('Authorization', $this->bearer)->get('/api/carrinhos/user');
        $response->assertStatus(200);
    }
}
