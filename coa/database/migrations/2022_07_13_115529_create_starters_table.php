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
        Schema::create('starters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('lastname',250);
            $table->string('firstname',250);
            $table->string('gender',100);
            $table->date('birthday',250);
            $table->string('address',250);
            $table->string('insurance',100);
            $table->date('start_date');
            $table->string('statement',100);
            $table->string('loan',100);
            $table->string('is_complete',100);
            $table->string('is_debit',100);
            $table->string('loan_type',100);
            $table->string('pg_loan',100);
            $table->string('is_pg_complete',100);
            $table->string('pg_debit',100);
            $table->string('signature',100);
            $table->string('full_name',250);
            $table->date('date');
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
        Schema::dropIfExists('starters');
    }
};
