<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('user', function (Blueprint $table) {
        $table->dropColumn('npm'); // Hapus kolom npm
        $table->enum('jurusan', ['fisika', 'kimia', 'biologi', 'matematika', 'ilmu komputer']);
        $table->integer('semester')->unsigned()->default(1)->check(function($query){
            $query->whereBetween('semester', [1, 14]); // Batas maksimal semester adalah 14
        });
        $table->unsignedBigInteger('fakultas_id'); // Kolom fakultas_id

        // Set foreign key fakultas_id untuk berelasi dengan tabel fakultas
        $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
