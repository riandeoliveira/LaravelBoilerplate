<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="LoginRequestSchema",
 *   title="LoginRequest",
 *   type="object",
 * )
 */
class LoginRequestSchema {
  /**
   * @OA\Property(
   *   property="email",
   *   type="string",
   *   example="johndoe2000@email.com"
   * )
   */
  public string $email;

  /**
   * @OA\Property(
   *   property="password",
   *   type="string",
   *   example="$LittleJohn2000#"
   * )
   */
  public string $password;
}
