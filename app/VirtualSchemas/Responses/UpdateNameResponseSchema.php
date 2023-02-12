<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="UpdateNameResponseSchema",
 *   title="UpdateNameResponse",
 *   type="object"
 * )
 */
class UpdateNameResponseSchema {
  /**
   * @OA\Property(
   *   property="name",
   *   type="string"
   * )
   */
  public string $name;
}
