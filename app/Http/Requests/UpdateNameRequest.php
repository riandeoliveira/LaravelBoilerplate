<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\NameFormat;
use App\Traits\RequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNameRequest extends FormRequest {
  use RequestValidation;

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
      'name' => ['required', 'string', 'min:3', 'max:30', new NameFormat()],
    ];
  }
}
