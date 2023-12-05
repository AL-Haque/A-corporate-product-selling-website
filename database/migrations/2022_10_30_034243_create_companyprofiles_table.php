<?php

use App\Models\Companyprofile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('com_name', 100);
            $table->string('phone', 20);
            $table->string('phone_two', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address');
            $table->string('address_two')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('logo')->default('no.png');
            $table->text('map')->nullable();
            $table->timestamps();
        });

         // create default one 
         $content = new Companyprofile();
         $content->com_name = 'test name';
         $content->phone = '01700000000';
         $content->email = 'info@bestgoods.com';
         $content->address = 'Mirpur 10 (Behind Shah Ali Plaza), Dhaka-1216';
         $content->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companyprofiles');
    }
}
