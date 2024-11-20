<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'user';

    // Prevent mass assignment of the 'id' field
    protected $guarded = ['id'];

    // Define which fields are mass assignable
    protected $fillable = [
        'nama',
        'kelas_id',
        'foto',
        'jurusan',        // Add jurusan field
        'fakultas_id',    // Add fakultas_id field
        'semester',       // Add semester field
    ];

    // Method to get users along with class names
    public function getUser() {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }

    // Relationship with Kelas model
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relationship with Fakultas model (assuming Fakultas model exists)
    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}