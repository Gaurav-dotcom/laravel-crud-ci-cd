<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('content');
        });
    
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->default('Default Title'); // This is fine
            $table->text('content')->nullable(); // TEXT column cannot have a default value
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('content');
        });
    
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title');
            $table->text('content');
        });
    }
}
