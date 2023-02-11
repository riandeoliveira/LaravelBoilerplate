<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="UpdatePasswordRequestSchema",
 *   title="UpdatePasswordRequest",
 *   type="object"
 * )
 */
class UpdatePasswordRequestSchema {
  /**
   * @OA\Property(
   *   property="current_password",
   *   type="string",
   *   example="$LittleJohn2000#"
   * )
   */
  public string $current_password;

  /**
   * @OA\Property(
   *   property="password",
   *   type="string",
   *   example="$NewJohn2077#"
   * )
   */
  public string $password;

  /**
   * @OA\Property(
   *   property="password_confirmation",
   *   type="string",
   *   example="$NewJohn2077#"
   * )
   */
  public string $password_confirmation;
}
