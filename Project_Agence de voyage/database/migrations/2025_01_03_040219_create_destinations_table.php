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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('duration')->comment('Duration in days');
            $table->text('included_services')->nullable();
            $table->integer('max_guests')->default(20);
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('transportation')->default('Bus');
            $table->string('accommodation')->default('Hotel');
            $table->string('meals')->default('Breakfast');
            $table->text('highlights')->nullable();
            $table->text('itinerary')->nullable();
            $table->string('status')->default('upcoming');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
}; 