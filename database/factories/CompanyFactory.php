<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $route_file = 'seeders/';
        $array_img = [
                      $route_file.'1.jpg', 
                      $route_file.'2.jpg', 
                      $route_file.'3.jpg',
                      $route_file.'4.jpg'
                     ];
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'logo' => $this->faker->randomElement($array_img),
            'website' => $this->faker->domainName,
        ];
    }
}
