<?php

namespace Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ordersTest extends TestCase
{
    /**
     * A basic Unit get route autenticated.
     *
     * @return void
     */
    public function testAutenticated()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                    ->get('/api/orders');

        $response->assertStatus(200);
    }

    /**
     * A test Unit Create Order
     */
    public function testCreateOrder()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                     ->post('/api/orders', [
                        "user_id"=>12,
                        "address_id"=>1,
                        "payment_type"=>1
                     ]);

        $response->assertStatus(200);
    }
}
