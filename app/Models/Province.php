<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table="tbl_website_state";

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
