<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerja';
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'unit_id', 'id');
    }
}
