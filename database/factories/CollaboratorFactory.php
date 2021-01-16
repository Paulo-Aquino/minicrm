<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollaboratorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collaborator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = Company::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'company_id' => $this->faker->randomElement($company),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
