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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_code', 45)->nullable();
            $table->string('reference_number', 45)->nullable();
            $table->string('suppliers_type', 45)->nullable();
            $table->string('supplier_name', 250)->nullable();
            $table->string('cheque_writers_name', 250)->nullable();
            $table->string('mobile_number', 45)->nullable();
            $table->string('land_line_number', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('fax', 45)->nullable();
            $table->string('created_by', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('remarks', 45)->nullable();
            $table->integer('states')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
