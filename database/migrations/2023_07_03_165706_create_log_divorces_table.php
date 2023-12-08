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
        Schema::create('log_divorces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('directorate_id')->constrained('directorates');
            $table->foreignId('center_id')->constrained('card_version_centers');

            $table->date('date_contract_ad');
            $table->date('date_contract_he');
            $table->foreignId('province_contract_id')->constrained('provinces');
            $table->foreignId('directorate_contract_id')->constrained('directorates');
            $table->integer('divor_type');
            $table->string('divorce_reason');
            $table->integer('no_births_levi_husw_male');
            $table->integer('no_births_levi_husw_fem');
            $table->integer('no_births_live_wife_male');
            $table->integer('no_births_live_wife_fem');
            $table->date('date_marriage');
            $table->string('date_marriage_hj');
            $table->string('status_wife_after_divo');
            $table->string('Court_na');
            $table->integer('document_no');
            $table->date('date_document');
            $table->foreignId('request_statu_id')->constrained('request_status');
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
        Schema::dropIfExists('log_divorces');
    }
};
