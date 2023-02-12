<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Traits\RequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
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
      'email' => ['required', 'string', 'email', 'min:10', 'max:100'],
      'password' => ['required', 'string', 'min:8', 'max:20'],
    ];
  }
}
