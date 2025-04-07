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
        Schema::create('family_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('head_of_family_id');
            $table->foreign('head_of_family_id')->references('id')->on('head_of_families');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('profile_picture')->nullable();
            $table->integer('identity_number')->unique();
            $table->enum('gender', ['male','female'])->default('male');
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('occupation')->nullable();
            $table->enum('marital_status', ['single','married']);
            $table->enum('relation', ['wife','child','husband','father','mother','brother','sister']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
