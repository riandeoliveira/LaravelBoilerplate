<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameFormat implements Rule {
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
    return 'The :attribute must contain only letters and whitespace.';
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, mixed $value): bool {
    $hasOnlyLettersAndWhitespace = preg_match('/^[a-zA-Z\s]+$/', $value);

    if ($hasOnlyLettersAndWhitespace) {
      return true;
    }

    return false;
  }
}
