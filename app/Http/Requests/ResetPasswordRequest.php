<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\StrongPassword;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResetPasswordRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules(): array {
    return [
      'password' => ['required', 'string', 'min:8', 'max:20', new StrongPassword(), 'confirmed'],
      'password_confirmation' => ['required', 'string', 'min:8', 'max:20', new StrongPassword()],
    ];
  }

  protected function failedValidation(Validator $validator): void {
    $responseException = response()->json(['errors' => $validator->errors()], 422);

    throw new HttpResponseException($responseException);
  }
}
