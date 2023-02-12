<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UsernameFormat implements Rule {
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct() {
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(): string {
    return 'The :attribute must not contain whitespace.';
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, mixed $value): bool {
    $hasNoWhitespace = preg_match('/^[^\s]+$/', $value);

    if ($hasNoWhitespace) {
      return true;
    }

    return false;
  }
}
