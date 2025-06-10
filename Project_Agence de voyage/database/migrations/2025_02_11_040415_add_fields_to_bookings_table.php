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
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'transportation')) {
                $table->string('transportation')->after('total_price');
            }
            if (!Schema::hasColumn('bookings', 'accommodation')) {
                $table->string('accommodation')->after('transportation');
            }
            if (!Schema::hasColumn('bookings', 'meals')) {
                $table->string('meals')->after('accommodation');
            }
            if (!Schema::hasColumn('bookings', 'special_requests')) {
                $table->text('special_requests')->nullable()->after('meals');
            }
            if (!Schema::hasColumn('bookings', 'status')) {
                $table->string('status')->default('pending')->after('special_requests');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'transportation',
                'accommodation',
                'meals',
                'special_requests',
                'status'
            ]);
        });
    }
};
