<?php

namespace Tests\Feature;

use Tests\TestCase;

class DatabaseTables extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMoviesTable()
    {
        $this->assertDatabaseHas('movies',[]);
    }
}
