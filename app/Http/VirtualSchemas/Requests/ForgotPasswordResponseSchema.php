<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="ForgotPasswordRequestSchema",
 *   title="ForgotPasswordResponse",
 *   type="object"
 * )
 */
class ForgotPasswordResponseSchema {
  /**
   * @OA\Property(
   *   property="email",
   *   type="string",
   *   example="johndoe2000@email.com"
   * )
   */
  public string $email;
}
