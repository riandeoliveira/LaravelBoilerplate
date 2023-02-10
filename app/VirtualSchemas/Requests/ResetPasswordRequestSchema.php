<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="ResetPasswordRequestSchema",
 *   title="ResetPasswordRequest",
 *   type="object"
 * )
 */
class ResetPasswordRequestSchema {
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
