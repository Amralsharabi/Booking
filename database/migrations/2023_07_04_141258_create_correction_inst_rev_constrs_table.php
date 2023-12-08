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
        Schema::create('correction_inst_rev_constrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('common_data_id')->constrained('common_data');
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('directorate_id')->constrained('directorates');
            $table->foreignId('center_id')->constrained('card_version_centers');

            $table->integer('constraint_type');
            $table->string('no_Constraint');
            $table->date('date_constraint');
            $table->foreignId('province_cons_id')->constrained('provinces');
            $table->foreignId('directorate_Cons_id')->constrained('directorates');
            $table->foreignId('source_governance')->constrained('source_governances');
            $table->string('ruling_No');
            $table->date('ruling_date');
            $table->text('summary_ruling');
            
            $table->foreignId('request_statu_id')->constrained('request_status')->cascadeOnDelete();
            $table->date('time_attendees')->nullable();
            $table->string('time_attendees_hijri')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('correction_inst_rev_constrs');
    }
};
