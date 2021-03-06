<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->char("title");
            $table->integer("price");
            $table->text("description");
            $table->char("build_with");
            $table->boolean("consultation");
            $table->boolean('certificate');
            $table->char('type');
            $table->char('operating_system');
            $table->char('ram');
            $table->char('empty_storage');
            $table->text('will_study');
            $table->text('technology');
            $table->char('category');
            $table->char('payment_account');
            $table->char('payment_account_name');
            $table->char('phone_number');
            $table->char('slug');
            $table->char('thumbnail_file_name');
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
        Schema::dropIfExists('courses');
    }
}
