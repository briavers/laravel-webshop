<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orderId = Order::inRandomOrder()->first('id') ?? Order::factory()->create()->first->get('id');
        $productId = Product::inRandomOrder()->first('id') ?? Product::factory()->create()->first->get('id');

        return [
            'order_id' => $orderId,
            'product_id' => $productId,
            'name' => $this->faker->name(),
            'unit_price' => $this->faker->numerify('##.##'),
            'quantity' => $this->faker->numberBetween(0, 10),
            'size' =>  $this->faker->randomElement(['s', 'm', 'l']),
            'color' =>  $this->faker->randomElement(['rood', 'groen', 'blauw']),
            'discount' => $this->faker->numerify('##.##'),
        ];
    }
}
