<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            // Link to universities table
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            
            $table->string('program_name'); // e.g. "BS Computer Science"
            $table->text('criteria')->nullable(); // e.g. "Min 60% marks"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};