<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'in_progress'])->default('pending');
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->timestamps();
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
