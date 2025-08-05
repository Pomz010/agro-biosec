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
        Schema::create('visitor_responses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('business_unit');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middle_name');
            $table->string('baranggay');
            $table->string('municipality_city');
            $table->string('province_region');
            $table->string('company_name');
            $table->string('company_street');
            $table->string('company_baranggay');
            $table->string('company_municipality');
            $table->string('company_province');
            $table->string('nature_of_visit');
            $table->string('plate_number');
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
        Schema::dropIfExists('visitor_responses');
    }
};
