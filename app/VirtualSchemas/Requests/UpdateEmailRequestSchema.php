<?php

namespace App\VirtualSchemas\Requests;

/**
 * @OA\Schema(
 *   schema="UpdateEmailRequestSchema",
 *   title="UpdateEmailRequest",
 *   type="object"
 * )
 */
class UpdateEmailRequestSchema {
  /**
   * @OA\Property(
   *   property="email",
   *   type="string",
   *   example="newjohndoe2000@email.com"
   * )
   */
  public string $email;
}
