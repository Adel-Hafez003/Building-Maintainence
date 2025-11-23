<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function requests() 
    {
        return $this->hasMany(Request::class);
    }
    public function technicians() 
    {
        return $this->hasMany(TechnicianDetail::class);
    }
}
