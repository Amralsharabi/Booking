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
        Schema::create('husband_wife_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->bigInteger('constraint_id');
            $table->integer('type_constraint');
            $table->integer('type_husb_wife');
            $table->string('forena');
            $table->string('secondna');
            $table->string('thirdna');
            $table->string('Tit');
            $table->date('date_pirth_Ad');
            $table->date('date_pirth_hegira');
            $table->foreignId('countrie_parth_id')->constrained('countrie_nationalits');
            $table->foreignId('province_parth_id')->constrained('provinces');
            $table->foreignId('directorate_parth_id')->constrained('directorates');
            $table->string('village_parth');
            $table->foreignId('countrie_acom_id')->constrained('countrie_nationalits');
            $table->foreignId('province_acom_id')->constrained('provinces');
            $table->foreignId('directorate_acom_id')->constrained('directorates');
            $table->string('village_accomm');
            $table->foreignId('nationality_id')->constrained('countrie_nationalits');
            $table->foreignId('religion_id')->constrained('religions');
            $table->foreignId('profession_id')->constrained('professions');
            $table->integer('educational_level');
            $table->integer('age_first_marri');
            $table->foreignId('social_statu_forme_id')->constrained('social_status')->nullable();
            $table->integer('former_no');
            $table->string('forena_moth');
            $table->string('secondna_moth');
            $table->string('thirdna_moth');
            $table->string('tit_moth');
            $table->integer('no_form_biths_live_male');
            $table->integer('no_form_biths_live_female');
            $table->foreignId('ty_documents_id')->constrained('ty_documents');
            $table->string('card_No');
            $table->date('date_card_version');
            $table->foreignId('card_version_center_id')->constrained('card_version_centers');
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
        Schema::dropIfExists('husband_wife_data');
    }
};
