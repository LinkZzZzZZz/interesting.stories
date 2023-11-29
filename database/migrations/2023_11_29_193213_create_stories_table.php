<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы "Истории".
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->integer('likes_count')->default(0);
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы "Истории".
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
