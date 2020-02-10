<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowcaseController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowcasePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('showcase');
    }
}
