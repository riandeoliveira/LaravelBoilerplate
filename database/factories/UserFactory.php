<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'username' => fake()->userName(),
      'name' => fake()->name(),
      'email' => fake()->unique()->safeEmail(),
      'email_verified_at' => now(),
      'password' => Hash::make(Str::random(14)),
      'remember_token' => Str::random(10),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return static
   */
  public function unverified(): self {
    return $this->state(function(array $attributes): array {
      return ['email_verified_at' => null];
    });
  }
}
