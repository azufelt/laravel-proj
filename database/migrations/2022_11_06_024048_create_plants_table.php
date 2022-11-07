<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table-> string('name');
            $table-> longText('plantdesc')->nullable();
            $table-> string('family', 100)->nullable();
            $table-> string('grow_season', 50)->nullable();
            $table-> integer('grow_temp')->nullable();
            $table-> integer('humidity')->nullable();
            $table-> string('img')->nullable();
            $table-> string('propagate', 100)->nullable();
            $table-> set('sunlight', ['full_sun', 'part_sun', 'shade', 'indoor'])->nullable();
            $table-> integer('toxic')->nullable();
            $table-> string('water', 100)->nullable();
            $table-> integer('zone')->nullable();
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
        Schema::dropIfExists('plants');
    }
}
