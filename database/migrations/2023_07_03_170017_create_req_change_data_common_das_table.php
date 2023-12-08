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
        Schema::create('req_change_data_common_das', function (Blueprint $table) {
            $table->id();
            $table->foreignId('req_change_data_common_id')->constrained('req_change_data_commons')->cascadeOnDelete();
            $table->string('new_data');
            $table->foreignId('ty_data_req_change_id')->constrained('ty_data_req_changes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('req_change_data_common_das');
    }
};
