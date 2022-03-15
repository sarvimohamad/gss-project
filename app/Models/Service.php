<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','mobile','telephone','address','province','city','desc','typeRequest','bankName','serial','status_id',
        'demand','reason_id' ,'type_id','post_center','breakdown','code_branch'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }
    public function type()
    {
        return $this->belongsTo(TypeRequest::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(Province::class);
    }
}
