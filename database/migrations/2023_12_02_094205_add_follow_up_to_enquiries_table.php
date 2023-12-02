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
        Schema::table('enquiries', function (Blueprint $table) {
            $table->string('follow_up')->default('0')->nullable();
            $table->text('address')->after('full_name');
            $table->string('status')->default('i')->nullable()->comment("b=booking a=admission i=initial");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropColumn('follow_up');
            $table->dropColumn('full_name');
            $table->dropColumn('status');
        });
    }
};
