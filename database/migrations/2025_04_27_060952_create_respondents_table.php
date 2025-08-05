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
        Schema::create('respondents', function (Blueprint $table) {
            $table->id()->primary('id')->autoIncrement();
            $table->string('employee_id', length: 11)->unique();
            $table->string('lastname', length: 100);
            $table->string('firstname', length: 100);
            $table->string('middle_name', length: 100);
            $table->string('email', length: 100)->nullable();
            $table->string('business_unit_address', length: 100);
            $table->boolean('is_resigned')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondents');
    }
};
