<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_bank_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->float('credit_limit', 10, 0)->nullable();
            $table->date('credit_period')->nullable();
            $table->integer('privileges_discount')->nullable();
            $table->string('bank_name', 45)->nullable();
            $table->string('branch_name', 45)->nullable();
            $table->string('created_by', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('remarks', 45)->nullable();
            $table->integer('states')->nullable();
            $table->integer('supplier_id')->index('fk_supplier_bank_details_suppliers1_idx');
            $table->integer('bank_id')->index('fk_supplier_bank_details_banks1_idx');

            $table->primary(['id', 'supplier_id', 'bank_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_bank_details');
    }
}
