<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word
        ];
    }


    /**
     * Get a new model instance.
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function newModel(array $attributes = [])
    {
        return new Tag($attributes);
    }
}
