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
            $table->uuid('uuid')->unique();
            $table->string('user_uuid')->index();
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->string('vehicle_category_uuid')->index();
            $table->foreign('vehicle_category_uuid')->references('uuid')->on('vehicle_categories')->onDelete('cascade');
            $table->string('vehicle_brand_uuid')->index();
            $table->foreign('vehicle_brand_uuid')->references('uuid')->on('vehicle_categories')->onDelete('cascade');
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
