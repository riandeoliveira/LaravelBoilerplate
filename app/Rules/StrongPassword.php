<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPassword implements Rule {
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
    return 'The :attribute must contain at least one uppercase letter, one lowercase letter, one number and one special character.';
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, mixed $value): bool {
    $isStrongPassword = preg_match('/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', $value);

    if ($isStrongPassword) {
      return true;
    }

    return false;
  }
}
