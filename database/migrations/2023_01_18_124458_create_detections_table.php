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
        Schema::create('detections', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->tinyInteger('status')->default('1');
            $table->bigInteger('specialty_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('doctor_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('price_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('date_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detections');
    }
};
