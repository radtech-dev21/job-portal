<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
<<<<<<< HEAD
            $table->float('experience');
=======
>>>>>>> 4d93a87e7db9d18a55c72031f516f3a74a1e1fa0
            $table->json('locations');
            $table->float('experience');
            $table->float('current_ctc');
            $table->float('expected_ctc');
            $table->integer('notice_period');
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
        Schema::dropIfExists('employees');
    }
}
