<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSupplierBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_bank_details', function (Blueprint $table) {
            $table->foreign(['supplier_id'], 'fk_supplier_bank_details_suppliers1')->references(['id'])->on('suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['bank_id'], 'fk_supplier_bank_details_banks1')->references(['id'])->on('banks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_bank_details', function (Blueprint $table) {
            $table->dropForeign('fk_supplier_bank_details_suppliers1');
            $table->dropForeign('fk_supplier_bank_details_banks1');
        });
    }
}
