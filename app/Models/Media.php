<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function request()
    {
        // Laravel سيبحث عن المفتاح الخارجي 'request_id' في جدول 'media'
        return $this->belongsTo(Request::class);
    }
}
