<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->realText(30);

        return [
            'likes' => $this->faker->numberBetween(0, 1000),
            'views' => $this->faker->numberBetween(0, 100000),
            'img'   => str_replace('#', '', $this->faker->hexcolor) . '/?text=' . $this->faker->word,
            'slug'  => \Str::slug($title, '-'),
            'title' => $title,
            'text'  => $this->faker->text(),
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
        return new Article($attributes);
    }
}
