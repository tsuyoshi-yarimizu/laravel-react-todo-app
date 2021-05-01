<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('todo_id')->comment('Todo ID');
            $table->integer('user_id')->unsigned()->index('idx_user_id')->comment('User ID');
            $table->string('todo_name', 128)->comment('Todo名');
            $table->string('todo_detail', 1024)->comment('Todo詳細');
            $table->tinyInteger('priority')->unsigned()->comment('優先度');
            $table->date('expire_date')->comment('期限');
            $table->dateTime('created_at')->useCurrent()->comment('レコード作成日時');
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate()->comment('レコード更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
