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
        Schema::table('depositos', function (Blueprint $table) {
            $table->string('stripe_payment_intent_id')->nullable()->after('cantidad');
            $table->string('metodo_pago')->nullable()->after('stripe_payment_intent_id');
            $table->enum('estado', ['pending', 'completed', 'failed'])->default('pending')->after('metodo_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('depositos', function (Blueprint $table) {
            //
        });
    }
};
