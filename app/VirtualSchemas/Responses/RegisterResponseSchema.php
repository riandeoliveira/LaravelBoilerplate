<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="RegisterResponseSchema",
 *   title="RegisterResponse",
 *   type="object",
 * )
 */
class RegisterResponseSchema {
  /**
   * @OA\Property(
   *   property="token",
   *   type="string"
   * )
   */
  public string $token;

  /**
   * @OA\Property(
   *   property="user",
   *   type="object",
   *
   *   @OA\Property(
   *     property="id",
   *     type="integer",
   *   ),
   *
   *   @OA\Property(
   *     property="username",
   *     type="string"
   *   ),
   *
   *   @OA\Property(
   *     property="name",
   *     type="string",
   *   ),
   *
   *   @OA\Property(
   *     property="email",
   *     type="string",
   *   ),
   *
   *   @OA\Property(
   *     property="email_verified_at",
   *     type="string",
   *   ),
   *
   *   @OA\Property(
   *     property="created_at",
   *     type="string",
   *   ),
   *
   *   @OA\Property(
   *     property="updated_at",
   *     type="string",
   *   ),
   * )
   */
  public object $user;
}
