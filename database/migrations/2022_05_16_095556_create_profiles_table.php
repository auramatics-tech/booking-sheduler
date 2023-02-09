<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name_ko')->nullable();
            $table->string('name_en')->nullable();
            $table->string('skype_id')->nullable();
            $table->string('zoom_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();

            $table->string('major')->nullable();
            $table->string('country')->nullable();
            $table->string('youtube_link')->nullable();
            $table->longText('tags')->nullable();
            $table->text('introduction')->nullable();


            $table->foreignId('user_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('profiles');
    }
}
