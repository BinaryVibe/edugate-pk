<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_deadlines', function (Blueprint $table) {
            $table->id();
            // Link to universities table. If uni is deleted, delete deadlines too.
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            
            $table->string('title'); // e.g. "Fall 2025"
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Open', 'Closed', 'Upcoming'])->default('Upcoming');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_deadlines');
    }
};