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
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->text('name_en');
            $table->text('name_ar');
            $table->text('phone');
            $table->text('photo')->nullable();
            $table->text('description_en');
            $table->text('description_ar');
            $table->bigInteger('specoalty_id')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('doctors');
    }
};
