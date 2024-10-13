<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganModel extends Model
{
    use HasFactory;
    protected $table = "potongan2";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_potongan',
        'id',
        'jenis_pajak',
        'nilai_pajak',
        'status1',
        'ebilling',
        'created_at',
        'updated_at',
    ];
}
