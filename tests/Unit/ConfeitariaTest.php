<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ConfeitariaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


    public function userTest(){
        $response = $this->withHeaders(['X-Header' => 'Value',])->post('/user', ['name' => 'Matheus']);

        $response->assertStatus(201);
    }


    public function carrinhoTest(){
         
        $response = $this->withCookies([
            'product' => 'cake',
            'price' => 50,
        ])->get('/carrinho');

        $response->assertStatus(201);
    }
}
