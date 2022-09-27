<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test for product list
     *
     * @return void
     */
    public function test_product_list()
    {
        $this->seed();

        $response = $this->get('api/v1/products');

        $response->assertStatus(200)->assertExactJson(['data' => [
            [
                'sku' => '000001',
                'name' => 'BV Lean leather ankle boots',
                'category' => 'boots',
                'price' => [
                    'original' => 89000,
                    'final' => 62300,
                    'discount_percentage' => '30%',
                    'currency' => 'EUR',
                ],
            ], [
                'sku' => '000002',
                'name' => 'BV Lean leather ankle boots',
                'category' => 'boots',
                'price' => [
                    'original' => 99000,
                    'final' => 69300,
                    'discount_percentage' => '30%',
                    'currency' => 'EUR',
                ],
            ], [
                'sku' => '000003',
                'name' => 'Ashlington leather ankle boots',
                'category' => 'boots',
                'price' => [
                    'original' => 71000,
                    'final' => 49700,
                    'discount_percentage' => '30%',
                    'currency' => 'EUR',
                ],
            ], [
                'sku' => '000004',
                'name' => 'Naima embellished suede sandals',
                'category' => 'sandals',
                'price' => [
                    'original' => 79500,
                    'final' => 79500,
                    'discount_percentage' => null,
                    'currency' => 'EUR',
                ],
            ], [
                'sku' => '000005',
                'name' => 'Nathane leather sneakers',
                'category' => 'sneakers',
                'price' => [
                    'original' => 59000,
                    'final' => 59000,
                    'discount_percentage' => null,
                    'currency' => 'EUR',
                ],
            ]
        ], 'status' => 200]);
    }

    /**
     * Test category filter (query string)
     * 
     * @return void
     */
    public function test_category_filter()
    {
        $this->seed();

        $response = $this->get('api/v1/products?category=sandals');

        $response
            ->assertStatus(200)
            ->assertExactJson(['data' => [
                [
                    'sku' => '000004',
                    'name' => 'Naima embellished suede sandals',
                    'category' => 'sandals',
                    'price' => [
                        'original' => 79500,
                        'final' => 79500,
                        'discount_percentage' => null,
                        'currency' => 'EUR',
                    ],
                ]],
                'status' => 200,
            ]);
    }

    /**
     * Test price less than filter (query string)
     * 
     * @return void
     */
    public function test_price_less_than_filter()
    {
        $this->seed();

        $response = $this->get('api/v1/products?priceLessThan=59000');

        $response
            ->assertStatus(200)
            ->assertExactJson(['data' => [
                [
                    'sku' => '000005',
                    'name' => 'Nathane leather sneakers',
                    'category' => 'sneakers',
                    'price' => [
                        'original' => 59000,
                        'final' => 59000,
                        'discount_percentage' => null,
                        'currency' => 'EUR',
                    ],
                ]],
                'status' => 200,
            ]);
    }

     /**
     * Must return at most 5 elements
     * 
     * @return void 
     */
    public function test_return_at_most_5_elements()
    {
        $this->seed();
        
        $response = $this->get('api/v1/products');
        
        $response->assertStatus(200);
        $this->assertEquals(5, count($response->json()['data']));
    }
}
