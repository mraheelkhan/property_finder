<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('title');
            $table->text('description')->nullable();
            $table->string('street_name')->nullable();
            $table->string('house');
            $table->integer('listing_area_id');
            $table->string('type');
            $table->integer('price');
            $table->string('price_type');
            $table->text('size')->nullable();
            $table->integer('garages')->nullable();
            $table->integer('bedrooms');
            $table->integer('bathroom');
            $table->integer('siderooms')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('kitchens')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('contact1')->nullable();
            $table->text('contact2')->nullable();
            $table->text('status');
            $table->string('comment')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
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
        Schema::dropIfExists('listings');
    }
}
