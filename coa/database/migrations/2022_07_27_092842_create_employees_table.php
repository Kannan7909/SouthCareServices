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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title',10);
            $table->string('surname',250);
            $table->string('firstname',250);
            $table->string('posts',100);
            $table->string('status',100);
            $table->string('address1',250);
            $table->string('address2',250);
            $table->string('postcode',100);
            $table->string('contact_no',100);
            $table->string('uk_contact_no',100);
            $table->string('email',250);
            $table->string('login_id',250);
            $table->string('password',250);
            $table->string('email_verified')->default('pending');
            $table->string('document_verified')->default('pending');
            $table->string('bank')->default('pending');
            $table->string('starter_verified')->default('pending');
            $table->string('health_verified')->default('pending');
            $table->string('application_verified')->default('pending');
            $table->string('forms_verified')->default(0);;
            $table->rememberToken();
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
};
