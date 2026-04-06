<?php

namespace Database\Factories;

use App\Models\ThirdParty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThirdPartyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ThirdParty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'blogger',
            'base_url' => $this->faker->url(),
            'description' => $this->faker->sentence(),
            'user_id' => User::factory(),
            'verified' => false,
        ];
    }
}
