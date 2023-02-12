<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="UpdateNameRequestSchema",
 *   title="UpdateNameRequest",
 *   type="object"
 * )
 */
class UpdateNameRequestSchema {
  /**
   * @OA\Property(
   *   property="name",
   *   type="string",
   *   example="John Doe"
   * )
   */
  public string $name;
}
