<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'NIP', 'Nama', 'Jabatan','Bidangnsub','Unit','Email'
    ];
    protected $primaryKey = "id_k";
    public $incrementing = false;

}