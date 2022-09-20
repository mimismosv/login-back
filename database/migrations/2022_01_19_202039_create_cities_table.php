<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->double('latitude', 8, 2)->nullable();
            $table->double('longitude', 8, 2)->nullable();
            $table->string('state_name')->nullable()->index();
            $table->string('state_code')->nullable()->index();
            $table->string('country_code', 2)->index();
            $table->string('timezone')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
