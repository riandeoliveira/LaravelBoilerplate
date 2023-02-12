<?php

declare(strict_types=1);

namespace App\VirtualSchemas\Responses;

/**
 * @OA\Schema(
 *   schema="LoggedUserResponseSchema",
 *   title="LoggedUserResponse",
 *   type="object"
 * )
 */
class LoggedUserResponseSchema {
  /**
   * @OA\Property(
   *   property="created_at",
   *   type="string"
   * )
   */
  public string $created_at;

  /**
   * @OA\Property(
   *   property="email",
   *   type="string"
   * )
   */
  public string $email;

  /**
   * @OA\Property(
   *   property="email_verified_at",
   *   type="string"
   * )
   */
  public string $email_verified_at;

  /**
   * @OA\Property(
   *   property="id",
   *   type="integer"
   * )
   */
  public int $id;

  /**
   * @OA\Property(
   *   property="name",
   *   type="string"
   * )
   */
  public string $name;

  /**
   * @OA\Property(
   *   property="updated_at",
   *   type="string"
   * )
   */
  public string $updated_at;

  /**
   * @OA\Property(
   *   property="username",
   *   type="string"
   * )
   */
  public string $username;
}
