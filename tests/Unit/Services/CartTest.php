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
        $response = $this->get('/api/carts');
        $response->assertStatus(302);
    }


    /**
     * A basic unit test get.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->withHeader('Authorization', $this->bearer)->get('/api/carts');
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
                    ->post('/api/carts',[
                        "produto_id"=>108,
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
        $response = $this->withHeader('Authorization', $this->bearer)->get('/api/carts/user');
        $response->assertStatus(200);
    }

}
