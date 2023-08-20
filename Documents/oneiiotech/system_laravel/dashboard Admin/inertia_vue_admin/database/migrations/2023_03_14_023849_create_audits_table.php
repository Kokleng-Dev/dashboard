<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('audits', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('table_name')->nullable();
            $table->string('action')->nullable();
            $table->text('old_data')->nullable();
            $table->text('new_data')->nullable();
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('is_rollback')->default(0);
            $table->bigInteger('action_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->tinyInteger('active')->default(1)->comment('1=active; 0=deleted');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
};
