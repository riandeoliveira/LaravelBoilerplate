<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="LogoutResponseSchema",
 *   title="LogoutResponse",
 *   type="object"
 * )
 */
class LogoutResponseSchema {
  /**
   * @OA\Property(
   *   property="message",
   *   type="string"
   * )
   */
  public string $message;
}
