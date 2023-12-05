<?php

use App\Models\About;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description');
            $table->string('image')->default('no.png');
            $table->integer('updated_by')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // create default one 
        $welcome = new About();
        $welcome->title = 'title name';
        $welcome->description = 'ryey y ey eye';
        $welcome->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
