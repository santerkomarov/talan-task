<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UsersCatalog;

class UsersCatalogFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsersCatalog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fio' => $this->faker->unique()->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->numerify('+7### ###-##-##'),
        ];
    }
}
