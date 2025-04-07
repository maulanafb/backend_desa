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
        Schema::create('head_of_families', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid(('user_id'));
            //profile_picture
            $table->string('profile_picture');
            $table->integer('identity_number')->unique();
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth');
            $table->string('occupation');
            $table->enum('marital_status',['single','married','divorced','widowed']);


            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_of_families');
    }
};
