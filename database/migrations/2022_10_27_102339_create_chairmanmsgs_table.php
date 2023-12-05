<?php

use App\Models\Chairmanmsg;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairmanmsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairmanmsgs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('designation', 100);
            $table->text('description');
            $table->string('image')->default('no.png');
            $table->timestamps();
        });

        // create default one 
        $welcome = new Chairmanmsg();
        $welcome->name = 'title name';
        $welcome->designation = 'designation';
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
        Schema::dropIfExists('chairmanmsgs');
    }
}
