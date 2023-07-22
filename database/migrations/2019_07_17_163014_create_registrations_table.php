<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id');
            $table->index('user_id');

            $table->bigInteger('payment_id')->nullable();
            $table->index('payment_id');

            $table->string('image')->nullable();
            $table->string('registration_no')->nullable();
            $table->date('date')->nullable();
            $table->integer('months')->nullable();
            $table->string('amount')->nullable();
            $table->date('end_date')->nullable();
            $table->string('name');
            $table->longText('address')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_contact')->nullable();
            $table->string('addiction')->nullable();
            $table->longText('health_note')->nullable();
            $table->longText('workout_goal')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
