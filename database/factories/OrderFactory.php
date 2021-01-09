<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::inRandomOrder()->first('id') ?? User::factory()->create()->first->get('id');
        return [
            'user_id' => $userId,
            'status' => $this->faker->randomElement(OrderStatusEnum::getTypes()),
            'total_inclusive' => $this->faker->numerify('##.##'),
            'total_exclusive' => $this->faker->numerify('##.##'),
            'total_vat' => $this->faker->numerify('##.##'),
            'present' => $this->faker->boolean(),
        ];
    }
}
