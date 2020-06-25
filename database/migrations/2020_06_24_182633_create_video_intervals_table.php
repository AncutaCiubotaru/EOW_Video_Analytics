<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_intervals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('video_id');
            $table->float('start_interval')->nullable(true);
            $table->float('end_interval')->nullable(true);
            $table->float('video_duration');
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
        Schema::dropIfExists('video_intervals');
    }
}
