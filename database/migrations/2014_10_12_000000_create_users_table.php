<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            // $table->id();
            $table->string('name',80);
            $table->string('email',80)->unique();
            $table->boolean('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image',30)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('address',191)->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
