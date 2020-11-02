<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->nullable();
            $table->integer('people')->nullable();
            $table->integer('food')->default(0);
            $table->integer('residence')->default(0);
            $table->integer('full_cost')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('status')->default(0);
            $table->string('contacts')->nullable();
            
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
        Schema::dropIfExists('permits');
    }
}
