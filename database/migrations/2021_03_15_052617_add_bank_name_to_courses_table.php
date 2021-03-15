<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankNameToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->char('bankName');
            $table->char('bankName1');
            $table->char('payment_account1');
            $table->char('payment_account_name1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('bankName');
            $table->dropColumn('bankName1');
            $table->dropColumn('payment_account1');
            $table->dropColumn('payment_account_name1');
        });
    }
}
