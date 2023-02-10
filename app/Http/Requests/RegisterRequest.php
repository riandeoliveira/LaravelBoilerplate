<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\StrongPassword;
use App\Traits\RequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
  use RequestValidation;

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules(): array {
    return [
      'name' => ['required', 'string', 'min:3', 'max:255', 'alpha'],
      'email' => ['required', 'string', 'email', 'min:10', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'max:20', new StrongPassword()],
    ];
  }
}
