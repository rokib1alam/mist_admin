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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('Depthead');
            $table->string('hour');
            $table->mediumText('shortdesc')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('admissionfee');
            $table->string('semesterfee');
            $table->string('tutionfee');
            $table->string('totalcost');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');
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
        Schema::dropIfExists('courses');
    }
};
