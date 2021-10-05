<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_record', function (Blueprint $table) {
            $table->id();
            $table->integer('hirer_id');
            $table->integer('employee_id');
            $table->text('msg');
            $table->integer('type')->default(0)->comment('0 / null = text, 1 = image, 2=video');
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
        Schema::dropIfExists('chat_record');
    }
}
