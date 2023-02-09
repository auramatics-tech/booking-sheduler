<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_app')->nullable();
            $table->string('logo_app')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('skype_id')->nullable();
            $table->string('kako_link')->nullable();
            $table->string('chat_link')->nullable();
            $table->string('address')->nullable();
            $table->string('operating_hours')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
