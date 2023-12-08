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
        Schema::create('statement_req_corrections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('correction_inst_rev_constr_id')->constrained('correction_inst_rev_constrs');
            $table->string('old_statement',50);
            $table->string('old_statement_code',10);
            $table->string('new_statement',50);
            $table->string('new_statement_code',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statement_req_corrections');
    }
};
