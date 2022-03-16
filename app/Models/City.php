<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table="tbl_website_city";

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
