<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            //socials links
            $table->longText('facebook_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('linkedin_link')->nullable();
            $table->longText('tiktok_link')->nullable();

            //infos application
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('localisation')->nullable();
            $table->longText('google_maps')->nullable();
            $table->string('siege_social')->nullable();

            //Security
            $table->boolean('mode_maintenance')->default(0); 
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
