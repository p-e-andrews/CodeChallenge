<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Process;
use App\Traits\Uuids;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'name' => fake()->word(),
            'description' => fake()->text(),
            'code' => fake()->randomNumber(4, true), // https://fakerphp.github.io/formatters/numbers-and-strings/
            'status' => fake()->boolean(),
        ];
    }
}
