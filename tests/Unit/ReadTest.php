<?php

namespace Tests\Unit;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Process;


class ReadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function test_read_crud() {
        //Given we have a process in the database
        $process = Process::factory()->create();

        //When a user visits the processes page
        $response = $this->get('/processes');
        
        //Then a user should be able to read the process
        $response->assertSee($process->name);
    }
}
