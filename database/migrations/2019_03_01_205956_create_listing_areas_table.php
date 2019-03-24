<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area_name')->nullable();
            $table->string('sector_name');
            $table->integer('city_id');
            $table->string('subsector_name')->nullable();
            $table->string('town')->nullable();
            $table->string('comment')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->float('radius')->nullable();
            $table->integer('population')->nullable();
            $table->text('status');
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
        Schema::dropIfExists('listing_areas');
    }
}
