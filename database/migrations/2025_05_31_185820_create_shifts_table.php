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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Mitarbeiter
            $table->string('type'); // Früh/Spät/Nacht
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('status', ['offen', 'getauscht', 'akzeptiert', 'abgelehnt'])->default('offen');
            $table->text('note')->nullable();
            $table->timestamps();

            // Fremdschlüssel auf User (User-Modell muss existieren)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};