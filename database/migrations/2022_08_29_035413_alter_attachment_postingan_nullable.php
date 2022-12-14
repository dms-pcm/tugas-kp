<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAttachmentPostinganNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postingan', function (Blueprint $table) {
            $table->string('attachment')->nullable(true)->change();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postingan', function (Blueprint $table) {
            $table->string('attachment')->nullable(false)->change();;
        });
    }
}
