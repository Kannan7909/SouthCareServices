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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('posts',100);
            $table->string('title',10);
            $table->string('surname',250);
            $table->string('firstname',250);
            $table->date('date_of_birth');
            $table->string('marital_status',100);
            $table->string('nationality',100);
            $table->string('ni_number',250);
            $table->string('address',250);
            $table->string('postcode',100);
            $table->string('tel_no',100);
            $table->string('mobile_no',100);
            $table->string('email',250);
            $table->string('passport_no',250);
            $table->string('place_of_issue',250);
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('visa_status',250);
            $table->date('visa_expiry_date');
            $table->string('course',250)->nullable();
            $table->string('relative_name',250);
            $table->string('relationship',250);
            $table->string('relative_address',250);
            $table->string('relative_tel',100);
            $table->string('relative_mobile',100);
            $table->string('relative_email',250);
            $table->string('study_place',250);
            $table->string('qualification',250);
            $table->date('qualified_date');
            $table->string('course_name',250);
            $table->date('date_attended');
            $table->date('course_expiry_date');
            $table->string('details',250)->nullable();
            $table->date('from');
            $table->date('to');
            $table->string('employer_name',250);
            $table->string('business_type',250);
            $table->string('job_title',100);
            $table->string('refer1_name',250);
            $table->string('refer2_name',250);
            $table->string('refer1_job',100);
            $table->string('refer2_job',100);
            $table->string('refer1_relation',100);
            $table->string('refer2_relation',100);
            $table->string('refer1_address',250);
            $table->string('refer2_address',250);
            $table->string('refer1_company',250);
            $table->string('refer2_company',250);
            $table->string('refer1_tel',100);
            $table->string('refer2_tel',100);
            $table->string('refer1_email',250);
            $table->string('refer2_email',250);
            $table->string('choose',100);
            $table->string('gender',100);
            $table->string('age',100);
            $table->string('disable',100);
            $table->string('disability_details',250)->nullable();
            $table->string('service',100);
            $table->string('offence',100);
            $table->string('disciplinary_procedure',100);
            $table->string('criminal_offence',100);
            $table->string('agree',100);
            $table->string('notes',250);
            $table->string('signature',250);
            $table->string('name',250);
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
        Schema::dropIfExists('applications');
    }
};
