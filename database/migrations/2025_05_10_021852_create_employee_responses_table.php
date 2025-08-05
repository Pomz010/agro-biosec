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
        Schema::create('employee_responses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('respondents_id')->constrained()->onDelete('cascade');
            $table->string('business_unit');
            $table->foreignId('questionnaire_id')->constrained()->onDelete('cascade');
            $table->string('answer', length: 100);
            $table->string('remarks', length: 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_responses');
    }
};
