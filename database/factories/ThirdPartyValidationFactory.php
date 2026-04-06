<?php

namespace Database\Factories;

use App\Models\ThirdParty;
use App\Models\ThirdPartyValidation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThirdPartyValidationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ThirdPartyValidation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'Meta',
            'validate_string' => $this->faker->sha256(),
            'third_party_id' => ThirdParty::factory(),
        ];
    }
}
