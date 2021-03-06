<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * @test
     */
    public function can_access_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_access_the_notes_page()
    {
        $response = $this->get('/notes');

        $response->assertStatus(200);
    }
}
