<?php

namespace Database\Factories;

use App\Enums\ReservationStatus;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::pluck('id');
        $customer = Customer::pluck('id');
        return [
            'reservation_description' => $this->faker->paragraph(),
            'reservation_date' => $this->faker->date(),
            'reservation_time' => $this->faker->time(),
            'reservation_guests' => $this->faker->numberBetween(1, 10),
            'reservation_status' => fake()->randomElement(ReservationStatus::cases())->value,
            'customer_id' => $customer->random(),
            'user_id' => $user->random(),
        ];
    }
}
