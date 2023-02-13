<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void {
    Schema::table('users', function(Blueprint $table): void {
      $table->dropColumn('username');
    });
  }
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void {
    Schema::table('users', function(Blueprint $table): void {
      $table->string('username')->unique()->after('id');
    });
  }
};
