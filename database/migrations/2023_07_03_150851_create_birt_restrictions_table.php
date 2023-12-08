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
        Schema::create('birth_restrictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('common_data_id')->constrained('common_data')->cascadeOnDelete();
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('directorate_id')->constrained('directorates')->cascadeOnDelete();
            $table->foreignId('center_id')->constrained('card_version_centers')->cascadeOnDelete();
            $table->foreignId('birth_type_id')->constrained('birth_typs');
            $table->foreignId('generated_id')->constrained('generated_whos');
            $table->foreignId('place_birth_id')->constrained('place_births');
            $table->date('date_pirth_Ad_father');
            $table->string('date_pirth_hegira_father');
            $table->foreignId('countrie_parth_fath_id')->constrained('countrie_nationalits');
            $table->foreignId('province_parth_father_id')->constrained('provinces');
            $table->foreignId('directorate_parth_father_id')->constrained('directorates');
            $table->string('village_parth_father',20);
            $table->foreignId('countrie_accom_fath_id')->constrained('countrie_nationalits');
            $table->foreignId('prov_accom_fath_id')->constrained('provinces');
            $table->foreignId('directorate_accom_fath_id')->constrained('directorates');
            $table->string('village_accomm_father');
            $table->foreignId('religions_fath_id')->constrained('religions');
            $table->foreignId('profession_father_id')->constrained('professions');
            $table->integer('educa_level_fath');
            $table->string('fath_age_first_marri');
            $table->foreignId('ty_document_fath_id')->constrained('ty_documents');
            $table->foreignId('card_vers_cent_fath_id')->constrained('card_version_centers');
            $table->string('card_id_fath');
            $table->date('date_pirth_ad_moth');
            $table->string('date_pirth_he_moth');
            $table->foreignId('countrie_parth_moth_id')->constrained('countrie_nationalits');
            $table->foreignId('province_parth_moth_id')->constrained('provinces');
            $table->foreignId('directorate_parth_moth_id')->constrained('directorates');
            $table->string('village_parth_moth');
            $table->foreignId('countrie_accom_moth_id')->constrained('countrie_nationalits');
            $table->foreignId('prov_acom_moth_id')->constrained('provinces');
            $table->foreignId('directorate_acom_moth_id')->constrained('directorates');
            $table->string('village_accomm_moth',20);
            $table->foreignId('religion_moth_id')->constrained('religions');
            $table->foreignId('profession_moth_id')->constrained('professions');
            $table->integer('educa_level_moth');
            $table->string('moth_age_first_marri',10);
            $table->foreignId('ty_document_moth_id')->constrained('ty_documents');
            $table->foreignId('card_vers_cent_moth_id')->constrained('card_version_centers');
            $table->string('card_id_moth');
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
        Schema::dropIfExists('birth_restrictions');
    }
};
