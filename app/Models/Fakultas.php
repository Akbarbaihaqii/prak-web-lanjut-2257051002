<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas'; // Ensure this points to the correct table

    // Add necessary fields to the fillable array if needed
    protected $fillable = ['nama_fakultas'];

    // If you need a custom method, you can define it like this:
    public function getFakultas() {
        return $this->all(); // This retrieves all faculties
    }
}