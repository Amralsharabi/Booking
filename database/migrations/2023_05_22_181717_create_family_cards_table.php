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
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('common_data_id')->constrained('common_data');
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('directorate_id')->constrained('directorates');
            $table->foreignId('center_id')->constrained('card_version_centers');
            $table->integer('blood_type_id');
            $table->foreignId('countrie_accom_form_id')->constrained('countrie_nationalits');
            $table->foreignId('province_acom_form_id')->constrained('provinces');
            $table->foreignId('directorate_acom_form_id')->constrained('directorates');
            $table->string('village_accomm_form', 30);
            $table->string('neigh_accomm_form', 30);
            $table->string('street_accomm_form', 30);
            $table->string('house_accom_form', 30);
            $table->string('phone', 30);
            $table->foreignId('card_version_center_id')->constrained('card_version_centers');
            $table->date('date_version');
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
        Schema::dropIfExists('family_cards');
    }
};
