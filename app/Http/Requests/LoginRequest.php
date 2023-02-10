<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest {
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
      'email' => ['required', 'string', 'email', 'min:10', 'max:255'],
      'password' => ['required', 'string', 'min:8', 'max:20'],
    ];
  }

  protected function failedValidation(Validator $validator): void {
    $responseException = response()->json(['errors' => $validator->errors()], 422);

    throw new HttpResponseException($responseException);
  }
}
