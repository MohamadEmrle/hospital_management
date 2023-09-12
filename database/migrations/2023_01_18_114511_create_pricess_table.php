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
        Schema::create('pricess', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->text('Profits_Dr');
            $table->text('Profits_center');
            $table->text('total_value');
            $table->bigInteger('doctor_id')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('pricess');
    }
};
