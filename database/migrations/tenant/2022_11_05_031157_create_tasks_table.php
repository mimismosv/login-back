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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();         //` BIGINT NOT NULL,
            $table->unsignedBigInteger('updated_by');         //` BIGINT NOT NULL,
            $table->string('title', 512);         //` VARCHAR(512) NOT NULL,
            $table->string('description', 2048)->nullable();          //` VARCHAR(2048) DEFAULT NULL,
            $table->integer('status')->default(0);         //` SMALLINT NOT NULL DEFAULT 0,
            $table->float('hours')->nullable();         //` FLOAT NOT NULL DEFAULT 0,
            $table->dateTime('planned_start_date')->nullable();         //` DATETIME NULL DEFAULT NULL,
            $table->dateTime('planned_end_date')->nullable();         //` DATETIME NULL DEFAULT NULL,
            $table->dateTime('actual_start_date')->nullable();         //` DATETIME NULL DEFAULT NULL,
            $table->dateTime('actual_end_date')->nullable();         //` DATETIME NULL DEFAULT NULL,
            $table->string('content', 2048);         //` TEXT NULL DEFAULT NULL,
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');
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
        Schema::dropIfExists('tasks');
    }
};
