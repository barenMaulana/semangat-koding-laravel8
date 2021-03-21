<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentMethodColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('payment_account');
            $table->char('payment_profile');
            $table->char('bank_name');
            $table->char('payment_account1')->nullable();
            $table->char('payment_profile1')->nullable();
            $table->char('bank_name1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('payment_account');
            $table->dropColumn('payment_profile');
            $table->dropColumn('bank_name');
            $table->dropColumn('payment_account1')->nullable();
            $table->dropColumn('payment_profile1')->nullable();
            $table->dropColumn('bank_name1')->nullable();
        });
    }
}
