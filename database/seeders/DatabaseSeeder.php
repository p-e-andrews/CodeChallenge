<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Process::factory(10)->create();

        // \App\Models\Process::factory()->create([
        //     'name' => 'Test User',
         //    'email' => 'test@example.com',
        // ]);
        //$this->call(ProcessSeeder::class);
    }
}
