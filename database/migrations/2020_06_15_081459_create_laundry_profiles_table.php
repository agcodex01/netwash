<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundryProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laundry_id');
            $table->string('name');
            $table->text('mission')->default('Lorem ipsum, dolor sit amet consectetur adipisicing 
                                                elit. Alias accusamus eveniet, necessitatibus ipsa error, 
                                                repellendus, explicabo cum rem perferendis labore 
                                                natus minima tenetur doloribus quasi aliquam ipsam. Odio, repellendus quidem?'); 
            $table->text('vission')->default('Lorem ipsum, dolor sit amet consectetur adipisicing 
                                                elit. Alias accusamus eveniet, necessitatibus ipsa error, 
                                                repellendus, explicabo cum rem perferendis labore 
                                                natus minima tenetur doloribus quasi aliquam ipsam. Odio, repellendus quidem?'); 
            $table->timestamps();

            $table->index('laundry_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry_profiles');
    }
}
