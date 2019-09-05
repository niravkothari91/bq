<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShippingDetailsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping_name')->nullable()->after('billing_phone');
            $table->string('shipping_address')->nullable()->after('shipping_name');
            $table->string('shipping_city')->nullable()->after('shipping_address');
            $table->string('shipping_province')->nullable()->after('shipping_city');
            $table->string('shipping_postalcode')->nullable()->after('shipping_province');
            $table->string('shipping_phone')->nullable()->after('shipping_postalcode');
            $table->string('gst_number')->nullable()->after('shipping_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shipping_name');
            $table->dropColumn('shipping_address');
            $table->dropColumn('shipping_city');
            $table->dropColumn('shipping_province');
            $table->dropColumn('shipping_postalcode');
            $table->dropColumn('shipping_phone');
            $table->dropColumn('gst_number');
        });
    }
}
