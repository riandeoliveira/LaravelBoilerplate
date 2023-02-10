<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="ResetPasswordResponseSchema",
 *   title="ResetPasswordResponse",
 *   type="object"
 * )
 */
class ResetPasswordResponseSchema {
  /**
   * @OA\Property(
   *   property="message",
   *   type="string"
   * )
   */
  public string $message;
}
