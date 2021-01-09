<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'nl' => $this->faker->name,
                'fr' => $this->faker->name,
                'en' => $this->faker->name,
                ],

            'description' => [
                'nl' => $this->faker->paragraph,
                'fr' => $this->faker->paragraph,
                'en' => $this->faker->paragraph,
                ],
            'unit_price' => $this->faker->randomFloat(2,0,60),
            'stock' => $this->faker->numberBetween(0, 50),
            'size' =>  $this->faker->randomElement([
                's', 'm', 'l'
                ]),
            'color' =>  $this->faker->randomElement([
                'nl' => $this->faker->randomElement(['rood', 'groen', 'blauw']),
                'fr' => $this->faker->randomElement(['rouge', 'vert', 'blue']),
                'en' => $this->faker->randomElement(['red', 'green', 'blue']),
            ]),

            'color_code' => $this->faker->randomElement(['#FF0000', '#00FF00', '#0000FF']),
            'discount' => $this->faker->numberBetween(0, 10),
            'uuid' => $this->faker->uuid,

        ];
    }
}
