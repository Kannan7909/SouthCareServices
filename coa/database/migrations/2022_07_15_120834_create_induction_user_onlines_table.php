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
        Schema::create('induction_user_onlines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id',20);
            $table->string('induction_id',20);
            $table->string('status',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('induction_user_onlines');
    }
};
