<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetCategories()
    {
        $response = $this->get('/api/v1/categories/');
	    $response->assertStatus(200);

	    $response = $this->get('/api/v1/nocategories/');
	    $response->assertStatus(404);
    }

    public function testCreateCategory()
    {

    }

    public function testUpdateCategory()
    {
        
    }

    public function testDeleteCategory()
    {

    }
}
