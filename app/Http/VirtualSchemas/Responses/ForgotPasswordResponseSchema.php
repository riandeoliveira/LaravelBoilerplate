<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="ForgotPasswordResponseSchema",
 *   title="ForgotPasswordResponse",
 *   type="object"
 * )
 */
class ForgotPasswordResponseSchema {
  /**
   * @OA\Property(
   *   property="message",
   *   type="string"
   * )
   */
  public string $message;
}
