<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('old_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('session');
            $table->string('status');
            $table->string('remarks')->nullable();
            $table->string('count');
            $table->string('month')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_admissions');
    }
};
