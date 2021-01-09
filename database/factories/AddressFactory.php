<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orderId = Order::inRandomOrder()->first('id') ?? Order::factory()->create()->first->get('id');
        return [
            'order_id' => $orderId,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'zipcode' => $this->faker->postcode,
            'city' => $this->faker->city,
        ];
    }
}
