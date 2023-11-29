<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание связывающей таблицы "Истории имеют тэги".
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('stories_has_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('story_id');
            $table->foreign('story_id')
                ->references('id')
                ->on('stories')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Удаление связывающей таблицы "Истории имеют тэги".
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('stories_has_tags');
    }
};
