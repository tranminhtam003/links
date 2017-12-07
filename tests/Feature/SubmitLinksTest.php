<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitLinksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    function guest_can_submit_a_new_link() {
    	$response = $this->post('/submit', [
    		'title' => 'Example Title',
    		'url' => 'http://example.com',
    		'description' => 'Example description.',
    	]);

    	$this->assertDatabaseHas('links', [
    		'title' => 'Example Title'
    	]);

    	$response
    		->assertStatus(302)
    		->assertHeader('Location', url('/'))

    	$this
    		->get('/')
    		->assertSee('Example Title');
    }

    /** @test */
    function link_is_not_create_if_validation_fails() {}

    /** @test */
    function link_is_not_create_with_an_invalid_url() {}

    /** @test */
    function max_length_fails_when_too_long() {}

    /** @test */
    function max_length_succeeds_when_under_max() {}
}
