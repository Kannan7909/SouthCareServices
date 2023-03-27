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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('title',10);
            $table->string('surname',250);
            $table->string('forename',250);
            $table->string('address',250);
            $table->string('postcode',100);
            $table->string('tel_no',100);
            $table->string('mobile_no',100);
            $table->string('email',250);
            $table->string('bank_name',250)->nullable();	
            $table->string('bank_address',250)->nullable();	
            $table->string('sort_code',250)->nullable();	
            $table->bigInteger('account_no')->nullable();	
            $table->string('account_holder',250)->nullable();	
            $table->bigInteger('payroll_id')->nullable();
            $table->date('start_date')->nullable();	
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
        Schema::dropIfExists('banks');
    }
};
