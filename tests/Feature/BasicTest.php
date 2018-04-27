<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    /** @test */
    public function is_home_page_up()
    {
        $this->get('/')->assertSeeText('Recent Entries');
    }
}
