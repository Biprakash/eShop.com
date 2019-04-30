<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_first_aname');
            $table->string('customer_last_aname');
            $table->string('customer_address');
            $table->integer('customer_mobile');
            $table->string('customer_city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('tbl_shipping', 'customer_email'))
        {
            Schema::table('tbl_shipping', function (Blueprint $table)
            {
                $table->dropColumn('customer_email');
            });
        }
    }
}
