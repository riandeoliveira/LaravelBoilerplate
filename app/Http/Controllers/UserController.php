<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\{ForgotPasswordRequest, LoginRequest, RegisterRequest, ResetPasswordRequest, UpdateEmailRequest, UpdateNameRequest, UpdatePasswordRequest};
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\{JsonResponse};
use Illuminate\Support\Facades\{Auth, DB, Hash, Mail};
use Illuminate\Support\Str;

/**
 * Class UserController
 *
 * @OA\Tag(
 *   name="User",
 *   description="Endpoints for authentication features",
 * )
 */
class UserController extends Controller {
  /**
   * @OA\Delete(
   *   path="/api/users/delete-user",
   *   summary="Delete a user",
   *   description="Deletes the user account and all its data.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success"
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   )
   * )
   */
  public function deleteUser(): JsonResponse {
    $currentUser = Auth::user();

    User::where('id', $currentUser->id)->delete();

    return response()->json([
      'message' => 'Successfully deleted user.',
    ]);
  }

  /**
   * @OA\Post(
   *   path="/api/users/forgot-password",
   *   summary="Handles forgotten password logic",
   *   description="Sends an email to the user with password reset data",
   *   tags={"User"},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="User email",
   *
   *     @OA\JsonContent(ref="#/components/schemas/ForgotPasswordRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/ForgotPasswordResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="404",
   *     description="Not Found"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function forgotPassword(ForgotPasswordRequest $request): JsonResponse {
    $credentials = $request->validated();

    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
      return response()->json([
        'error' => 'User not found.',
      ], 404);
    }

    DB::table('password_resets')->where('email', $credentials['email'])->delete();

    $token = Str::random(60);

    DB::table('password_resets')->insert([
      'email' => $user->email,
      'token' => $token,
      'created_at' => Carbon::now(),
    ]);

    Mail::to($credentials['email'])->send(new ForgotPasswordMail($user['name'], $user['email'], $token));

    return response()->json([
      'message' => 'A password reset message has been sent to your email.',
    ]);
  }

  /**
   * @OA\Get(
   *   path="/api/users/logged-user",
   *   summary="Get logged user",
   *   description="Returns the data of the currently logged user.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/LoggedUserResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   )
   * )
   */
  public function loggedUser(): JsonResponse {
    return response()->json(Auth::user());
  }

  /**
   * @OA\Post(
   *   path="/api/users/login",
   *   summary="Login a user",
   *   description="Log a user into the system.",
   *   tags={"User"},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="User data",
   *
   *     @OA\JsonContent(ref="#/components/schemas/LoginRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/LoginResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function login(LoginRequest $request): JsonResponse {
    $credentials = $request->validated();

    if (!Auth::attempt($credentials)) {
      return response()->json([
        'error' => 'Credentials do not match',
      ], 401);
    }

    $user = User::where('email', $credentials['email'])->first();

    DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();

    $token = $user->createToken('API Token')->plainTextToken;

    return response()->json([
      'user' => $user,
      'token' => $token,
    ]);
  }

  /**
   * @OA\Get(
   *   path="/api/users/logout",
   *   summary="Logout the user",
   *   description="Close the user session.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/LogoutResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   )
   * )
   */
  public function logout(): JsonResponse {
    $user = Auth::user();

    DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();

    return response()->json([
      'message' => 'User logged out successfully',
    ]);
  }

  /**
   * @OA\Post(
   *   path="/api/users/register",
   *   summary="Register a user",
   *   description="Register a user in the system.",
   *   tags={"User"},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="User data",
   *
   *     @OA\JsonContent(ref="#/components/schemas/RegisterRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/RegisterResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function register(RegisterRequest $request): JsonResponse {
    $credentials = $request->validated();

    $user = User::create([
      'username' => $credentials['username'],
      'name' => $credentials['name'],
      'email' => $credentials['email'],
      'password' => Hash::make($credentials['password']),
    ]);
    $token = $user->createToken('API Token')->plainTextToken;

    return response()->json([
      'user' => $user,
      'token' => $token,
    ]);
  }

  /**
   * @OA\Patch(
   *   path="/api/users/reset-password?token={token}",
   *   summary="Reset user password",
   *   description="Updates the user's password, allowing him to access the system again.",
   *   tags={"User"},
   *
   *   @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token for user password reset.",
   *     required=true,
   *
   *     @OA\Schema(
   *       type="string"
   *     )
   *   ),
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="New user password",
   *
   *     @OA\JsonContent(ref="#/components/schemas/ResetPasswordRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/ResetPasswordResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function resetPassword(ResetPasswordRequest $request): JsonResponse {
    $credentials = $request->validated();
    $token = $request->input('token');

    $tokenFound = DB::table('password_resets')->where('token', $token)->first();

    if (!$token || !$tokenFound) {
      return response()->json([
        'error' => 'Invalid or empty password reset token.',
      ], 422);
    }

    $email = $tokenFound->email;
    $password = $credentials['password'];

    User::where('email', $email)->update([
      'password' => Hash::make($password),
    ]);

    DB::table('password_resets')->where('email', $email)->delete();

    return response()->json([
      'message' => 'Password reset successfully.',
    ]);
  }

  /**
   * @OA\Patch(
   *   path="/api/users/update-email",
   *   summary="Update user email",
   *   description="Updates the user's email when he is logged.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="New user email",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdateEmailRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdateEmailResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function updateEmail(UpdateEmailRequest $request): JsonResponse {
    $credentials = $request->validated();
    $currentUser = Auth::user();

    User::where('id', $currentUser->id)->update([
      'email' => $credentials['email'],
    ]);

    return response()->json([
      'message' => 'Email updated successfully.',
    ]);
  }

  /**
   * @OA\Patch(
   *   path="/api/users/update-name",
   *   summary="Update user name",
   *   description="Updates the user's name when he is logged.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="New user name",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdateNameRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdateNameResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function updateName(UpdateNameRequest $request): JsonResponse {
    $credentials = $request->validated();
    $currentUser = Auth::user();

    User::where('id', $currentUser->id)->update([
      'name' => $credentials['name'],
    ]);

    return response()->json([
      'message' => 'Name updated successfully.',
    ]);
  }

  /**
   * @OA\Patch(
   *   path="/api/users/update-password",
   *   summary="Update user password",
   *   description="Updates the user's password when he is logged.",
   *   tags={"User"},
   *   security={{"sanctum":{}}},
   *
   *   @OA\RequestBody(
   *     required=true,
   *     description="New user password",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdatePasswordRequestSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="200",
   *     description="Success",
   *
   *     @OA\JsonContent(ref="#/components/schemas/UpdatePasswordResponseSchema")
   *   ),
   *
   *   @OA\Response(
   *     response="401",
   *     description="Unauthorized"
   *   ),
   *
   *   @OA\Response(
   *     response="422",
   *     description="Unprocessable Content"
   *   )
   * )
   */
  public function updatePassword(UpdatePasswordRequest $request): JsonResponse {
    $credentials = $request->validated();
    $currentUser = Auth::user();

    $isCorrectPassword = Hash::check($credentials['current_password'], $currentUser->password);

    if (!$isCorrectPassword) {
      return response()->json([
        'error' => 'Incorrect current password!',
      ], 401);
    }

    User::where('id', $currentUser->id)->update([
      'password' => Hash::make($credentials['password']),
    ]);

    return response()->json([
      'message' => 'Password updated successfully.',
    ]);
  }
}
