<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Process;


class CreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //
    public function test_create_crud() {
        //Given we have an EMPTY database
        Process::truncate();

        //And we have a process object
        $process = Process::factory()->make();

        //When a user submits a post request to create process endpoint
        $this->post('/processes/create', $process->toArray());
        
        //Refresh so database shows the correct number more quickly
        $process->refresh();

        //Then it gets stored in the database
        $this->assertEquals(1, Process::all()->count());
    }
}
