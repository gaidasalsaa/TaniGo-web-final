<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama');
            $table->string('no_hp')->nullable()->after('email');
            $table->date('tanggal_lahir')->nullable()->after('no_hp');
            $table->string('kota')->nullable()->after('tanggal_lahir');
            $table->text('alamat')->nullable()->after('kota');
            $table->string('foto_profil')->nullable()->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nama', 'jenis_kelamin', 'no_hp', 'tanggal_lahir', 'kota', 'alamat', 'foto_profil']);
        });
    }
};
