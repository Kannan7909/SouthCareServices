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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('posts',100);
            $table->string('surname',250);
            $table->string('first_name',250);
            $table->string('address',250);
            $table->string('postcode',100);
            $table->string('tel_no',100);
            $table->string('mobile_no',100);
            $table->string('gp_contact',250);
            $table->string('depression',100);
            $table->string('depression_note',250)->nullable();;
            $table->string('epilepsy',100);
            $table->string('epilepsy_note',250)->nullable();;
            $table->string('ailment',100);
            $table->string('ailment_note',250)->nullable();;
            $table->string('spinal',100);
            $table->string('spinal_note',250)->nullable();;
            $table->string('arthritis',100);
            $table->string('arthritis_note',250)->nullable();;
            $table->string('heart',100);
            $table->string('heart_note',250)->nullable();;
            $table->string('kidney',100);
            $table->string('kidney_note',250)->nullable();;
            $table->string('diabetes',100);
            $table->string('diabetes_note',250)->nullable();;
            $table->string('skin',100);
            $table->string('skin_note',250)->nullable();;
            $table->string('medication',100);
            $table->string('alcohol',100);
            $table->string('tobacco',100);
            $table->string('disabled',100);
            $table->string('benefit',100);
            $table->string('absent',100);
            $table->string('pregnant',100);
            $table->string('additional',250);
            $table->string('signature',100);
            $table->string('full_name',250);
            $table->string('date',100);
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
        Schema::dropIfExists('healths');
    }
};
