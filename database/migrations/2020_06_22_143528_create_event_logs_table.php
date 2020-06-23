<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_logs', function (Blueprint $table) {
            $table->id();
            $table->string('video_id');
            $table->string('user_id');
            $table->string('event_name');
            $table->float('duration')->nullable(true);
            $table->float('percent')->nullable(true);
            $table->float('seconds')->nullable(true);
            $table->string('message')->nullable(true);
            $table->string('method')->nullable(true);
            $table->string('name')->nullable(true);
            $table->float('volume')->nullable(true);
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
        Schema::dropIfExists('event_logs');
    }
}
