<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_addresses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('address_line_01');
            $table->string('address_line_02')->nullable();
            $table->string('address_line_03')->nullable();
            $table->string('city', 45)->nullable();
            $table->string('zip_postal_code', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('state', 45)->nullable();
            $table->string('supplier_code_id', 45)->nullable();
            $table->integer('billing_or_shipping')->nullable();
            $table->string('created_by', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('remarks', 45)->nullable();
            $table->integer('states')->nullable();
            $table->integer('supplier_id')->index('fk_supplier_addresses_suppliers1_idx');

            $table->primary(['id', 'supplier_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_addresses');
    }
}
