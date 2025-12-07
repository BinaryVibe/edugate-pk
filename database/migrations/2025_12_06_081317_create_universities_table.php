<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('city');
            $table->string('website_url')->nullable();
            $table->string('logo_path')->nullable(); // Stores 'image.png'
            $table->text('description')->nullable();
            $table->timestamp('last_updated')->useCurrent(); // Auto-updates
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};