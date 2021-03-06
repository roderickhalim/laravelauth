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
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('theme_id')->unsigned()->default(1);
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('business_type_id')->nullable()->references('id')->on('business_types');
            $table->string('followers')->nullable();
            $table->string('following')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('facebook_username')->nullable();        
            $table->text('avatar')->nullable();
            $table->boolean('avatar_status')->default(0);
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('id_picture')->nullable();
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
