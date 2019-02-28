<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HoroscopePageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHoroscopePageRetrieve()
    {
        $response = $this
            ->call('GET', '/')
            ->assertSee('Month')
            ->assertSee('Day')
            ->assertSee('Year')
            ->assertSee('january')
            ->assertSee('Submit')
            ->assertStatus(200);

        $response->assertSuccessful();
        $response->assertViewIs('welcome');
        $this->assertEquals(200, $response->status());
    }

    public function testHoroscopeForm(){

        $data = [
            '_token' => csrf_token(),
            'select-month' => 'may',
            'select-day' => 15,
            'select-year' => 1992
        ];

        $response= $this->post(route('posts.store'), $data)
            ->assertStatus(200)
            ->assertSeeText('Submit');

        $this->assertContains('Monkey', $response->getContent());

        $response->assertSuccessful();

    }

}
