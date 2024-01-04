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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('estate_type')->constrained('estates_types')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('estates_statuses')->onDelete('cascade');
            $table->longText('description');
            $table->text('location');
            $table->integer('number_of_bathroom')->nullable();
            $table->integer('number_of_bedroom')->nullable();
            $table->integer('number_of_kitchen')->nullable();
            $table->integer('number_of_garage')->nullable();
            $table->integer('number_of_floor')->nullable();
            $table->text('area');
            $table->text('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
};
