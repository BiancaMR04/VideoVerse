<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVideosTable extends Migration
{
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            if (!Schema::hasColumn('videos', 'categoria')) {
                $table->string('categoria')->nullable();
            }
            if (!Schema::hasColumn('videos', 'duracao')) {
                $table->double('duracao')->nullable();
            }
            if (!Schema::hasColumn('videos', 'estado_video')) {
                $table->string('estado_video')->nullable();
            }
            if (!Schema::hasColumn('videos', 'likes')) {
                $table->integer('likes')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('categoria');
            $table->dropColumn('duracao');
            $table->dropColumn('estado_video');
            $table->dropColumn('likes');
        });
    }
}
