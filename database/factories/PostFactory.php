<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\ThirdParty;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'third_party_id' => ThirdParty::factory(),
            'category_id' => Category::factory(),
            'post_id_in_thirdparty' => $this->faker->uuid(),
            'content' => $this->faker->paragraphs(3, true),
            'level' => 1,
            'hide' => false,
        ];
    }
}
