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
        Schema::create('files', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->text('name');
            $table->text('description');
            $table->text('file_type');
            $table->text('file');
            $table->bigInteger('detection_id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('user_id')->unsigned()->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('files');
    }
};
