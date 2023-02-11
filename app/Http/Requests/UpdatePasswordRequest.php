<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\StrongPassword;
use App\Traits\RequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest {
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
      'current_password' => ['required', 'string', 'min:8', 'max:20'],
      'password' => ['required', 'string', 'min:8', 'max:20', new StrongPassword(), 'confirmed'],
      'password_confirmation' => ['required', 'string', 'min:8', 'max:20', new StrongPassword()],
    ];
  }
}
