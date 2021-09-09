<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
    //    Schema::table('book', function (Blueprint $table) {
    //     DB::statement("ALTER TABLE book ADD FULLTEXT search (title, author)");
    //     $table->engine = 'MyISAM';
    //    });
   }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
   {
       
   }
}
