<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('image')->nullable(); // Adding an image column
            $table->rememberToken();
            $table->timestamps();
        });
    
        DB::table('category')->insert([
            ['category_name' => 'CWTS', 'image' => 'cwts.png', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'LTS', 'image' => 'lts.png', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'ROTC', 'image' => 'rotc.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
};
