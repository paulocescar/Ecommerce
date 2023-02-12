<?php

namespace Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * Testa se a rota exige autenticação.
     *
     * @return void
     */
    public function testUnauthorized()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(302);
        $response = $this->post('/api/categories');
        $response->assertStatus(302);
        $response = $this->get('/api/categories/pages/10');
        $response->assertStatus(302);
        $response = $this->get('/api/categories/1');
        $response->assertStatus(302);
    }

    /**
     * Teste de get da api categorias.
     *
     * @return void
     */
    public function testGet()
    {
        
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/categories');

        $response->assertStatus(200);
    }

    /**
     * Teste de get da api paginate categorias.
     *
     * @return void
     */
    public function testGetById()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/categories/1');

        $response->assertStatus(200);
    }

    /**
     * Teste de get da api paginate categorias.
     *
     * @return void
     */
    public function testGetPaginate()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/categories/pages/10');

        $response->assertStatus(200);

        $expectedCount = 10;
        $categories = json_decode($response->getContent(), true);
        
        $this->assertCount($expectedCount, $categories);
    }

    /**
     * Teste de create da api categoria.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->post('/api/categories', [
                            "descricao"=>"descricao",
                            "slug"=>"descricao",
                            'idCategoriaPai'=> null
                        ]);

        $response->assertStatus(200);
    }
}