@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 text-center p-6">
  <h1>Hello, {{ $name }}!</h1>
  <p>A password recovery request was made for your account <strong>({{ $email }})</strong>.</p>
  <p>If it wasn't you, please ignore this message.</p>
  <a href="/reset-password?token={{ $token }}" rel="external" class="underline">Click here to reset your password!</a>
</div>
@endsection
