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
        Schema::create('user_meetings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('meeting_id')->index();
            $table->boolean('accepted');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('restrict');
        });

        Schema::create('meeting_attendees', function (Blueprint $table) {
            $table->unsignedBigInteger('meeting_id')->index();
            $table->unsignedBigInteger('attendee_id')->index();
            $table->boolean('accepted');

            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('restrict');
            $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_attendees');
        Schema::dropIfExists('user_meetings');
    }
};
