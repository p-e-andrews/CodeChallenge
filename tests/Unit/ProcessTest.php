<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProcessTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // PA: use of databasemigrations will migrate db if req for every test & roll back afterwards
     use DatabaseMigrations;

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function can_read_crud() {
        //Given we have a process in the database
        $process = factory ('App\Process')->create();
        //When a user visits the processes page
        $response = $this->get('/processes');
        //Then a user should be able to read the process
        $response->assertSee($process->name);
    }
}
