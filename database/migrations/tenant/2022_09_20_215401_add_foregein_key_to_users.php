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
/**
 * Add a foreign key constraint to the users table that references the id column of the cities table,
 * and set the value to null if the referenced row is deleted or updated.
 */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('set null')
            ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};
