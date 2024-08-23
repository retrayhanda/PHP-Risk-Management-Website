<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\UnitKerja;
class Risk extends Model
{
    use HasFactory;
    protected $table = 'risk';
    protected $guarded = [
        'id'
    ];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'kode_unit', 'id');
    }

}

class Order extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->status)) {
                $model->status = 'pengajuan';
            }
        });
    }
}
