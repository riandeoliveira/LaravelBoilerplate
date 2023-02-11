<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="UpdateEmailResponseSchema",
 *   title="UpdateEmailResponse",
 *   type="object"
 * )
 */
class UpdateEmailResponseSchema {
  /**
   * @OA\Property(
   *   property="message",
   *   type="string"
   * )
   */
  public string $message;
}
