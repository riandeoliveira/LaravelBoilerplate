<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\{NameFormat, StrongPassword, UsernameFormat};
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
      'username' => ['required', 'string', 'min:3', 'max:30', 'unique:users', new UsernameFormat()],
      'name' => ['required', 'string', 'min:3', 'max:30', new NameFormat()],
      'email' => ['required', 'string', 'email', 'min:10', 'max:100', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'max:20', new StrongPassword()],
    ];
  }
}
