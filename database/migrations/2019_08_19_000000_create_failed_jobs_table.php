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
 * It creates a table called `failed_jobs` with a `uuid` column, a `connection` column, a `queue`
 * column, a `payload` column, an `exception` column, and a `failed_at` column.
 *
 * The `uuid` column is a unique identifier for each job. The `connection` column is the name of the
 * connection that the job was run on. The `queue` column is the name of the queue that the job was run
 * on. The `payload` column is the data that was passed to the job. The `exception` column is the
 * exception that was thrown when the job failed. The `failed_at` column is the timestamp of when the
 * job failed.
 */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
