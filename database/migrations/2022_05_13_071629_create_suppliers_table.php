<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('supplier_code', 45)->nullable();
            $table->string('reference_number', 45)->nullable();
            $table->string('suppliers_type', 250)->nullable();
            $table->string('supplier_name', 250)->nullable();
            $table->string('cheque_writers_name', 250)->nullable();
            $table->integer('mobile_number')->nullable();
            $table->integer('land_line_number')->nullable();
            $table->string('email', 45)->nullable();
            $table->integer('fax')->nullable();
            $table->string('created_by', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('remarks', 45)->nullable();
            $table->integer('states')->nullable();
            $table->integer('supplier_type_id')->index('fk_suppliers_supplier_types1_idx');

            $table->primary(['id', 'supplier_type_id']);
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
}
