<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // PA: use of databasemigrations will migrate db if req for every test & roll back afterwards
     use DatabaseMigrations;

    //
    public function can_create_crud() {
        //Given we have a process object
        $process = factory ('App\Process')->make();
        //When a user submits a post request to create process endpoint
        $this->post('/processes/create', $process->toArray());
        $response = $this->get('/processes');
        //Then it gets stored in the database
        $this->assertEquals(1, Process::all()->count());
    }
}
