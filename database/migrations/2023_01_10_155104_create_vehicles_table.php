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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_brand_id')->constrained()->cascadeOnDelete();
            $table->string('name',191)->nullable();
            $table->tinyInteger('num_of_seat')->nullable();
            $table->tinyInteger('num_of_passenger')->nullable();
            $table->string('model',191)->nullable();
            $table->mediumText('specification')->nullable();
            $table->string('image',64)->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
