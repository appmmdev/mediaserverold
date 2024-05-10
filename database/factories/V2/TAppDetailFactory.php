<?php

namespace Database\Factories\V2;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\V2\TAppDetail>
 */
class TAppDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'appversion' => '8.0.1',
            'updatemessage' => 'bug fix',
            'iosappversion' => '1.0.1',
            'iosupdatemessage' => 'bug fix',
        ];
    }
}
