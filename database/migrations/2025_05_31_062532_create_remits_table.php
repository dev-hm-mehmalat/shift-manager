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
        Schema::create('remits', function (Blueprint $table) {
            $table->id();
            $table->string('title');                          // Titel der Remit
            $table->decimal('amount', 10, 2)->nullable();     // Betrag (optional)
            $table->date('remit_date')->nullable();           // Datum (optional)
            $table->text('description')->nullable();          // Beschreibung (optional)
            $table->timestamps();                             // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remits');
    }
};