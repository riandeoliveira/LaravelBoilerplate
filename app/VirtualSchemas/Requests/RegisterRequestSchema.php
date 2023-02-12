<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="RegisterRequestSchema",
 *   title="RegisterRequest",
 *   type="object",
 * )
 */
class RegisterRequestSchema {
  /**
   * @OA\Property(
   *   property="email",
   *   type="string",
   *   example="johndoe2020@email.com"
   * )
   */
  public string $email;

  /**
   * @OA\Property(
   *   property="name",
   *   type="string",
   *   example="John Doe"
   * )
   */
  public string $name;

  /**
   * @OA\Property(
   *   property="password",
   *   type="string",
   *   example="$LittleJohn2000#"
   * )
   */
  public string $password;

  /**
   * @OA\Property(
   *   property="username",
   *   type="string",
   *   example="johndoe"
   * )
   */
  public string $username;
}
