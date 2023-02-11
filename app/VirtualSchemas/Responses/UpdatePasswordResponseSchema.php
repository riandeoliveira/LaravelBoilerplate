<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="UpdatePasswordResponseSchema",
 *   title="UpdatePasswordResponse",
 *   type="object"
 * )
 */
class UpdatePasswordResponseSchema {
  /**
   * @OA\Property(
   *   property="message",
   *   type="string"
   * )
   */
  public string $message;
}
