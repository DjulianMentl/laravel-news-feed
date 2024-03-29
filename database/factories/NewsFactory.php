<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{

    private int $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $img = '/images/img_' . ++$this->i . '.gif';
        sleep(1);

        return [
            'title' => $this->faker->realText(40),
            'preview' => $this->faker->realText(100),
            'text' => $this->faker->realText(500),
            'counter' => 0,
            'date' => now(),
            'image' => $img,
        ];
    }
}
