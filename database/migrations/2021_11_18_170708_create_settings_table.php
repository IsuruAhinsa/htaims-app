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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('site_name', 100)->default("Healthtronics Assets Information Management System");
            $table->string('color')->default('light');
            $table->string('logo_path')->nullable()->default(null);
            $table->char('favicon_path')->nullable()->default(null);
            $table->string('loginBackground_path')->nullable()->default('img/default-bg.jpg');
            $table->string('locale',5)->nullable()->default(config('app.locale'));
            $table->string('timezone',100)->nullable()->default(config('app.timezone'));
            $table->string('date_format')->default('Y-m-d');
            $table->string('time_format')->default('h:i A');
            $table->string('currency', 10)->nullable()->default('$');
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
