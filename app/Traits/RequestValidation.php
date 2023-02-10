<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestValidation {
  protected function failedValidation(Validator $validator): void {
    $responseException = response()->json(['errors' => $validator->errors()], 422);

    throw new HttpResponseException($responseException);
  }
}
