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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('remaining_day')->default(12);
            $table->integer('role')->default('0');
            $table->string('manager_id')->nullable();
        });

        Schema::create('request_form', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id');
            $table->string('manager_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status')->default('pending');
            $table->text('reason')->nullable();
            $table->text('manager_reason')->nullable();
            $table->dateTime('created_at')->now();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
        Schema::dropIfExists('request_form');
    }
};
