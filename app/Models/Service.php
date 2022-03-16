<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile', 'telephone', 'address', 'province', 'city', 'desc', 'typeRequest', 'bankName', 'serial', 'status_id',
        'demand', 'reason_id', 'type_id', 'post_center', 'breakdown', 'code_branch'];

    public function status()
    {
        return $this->belongsTo(Status::class);
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

    public function messages()
    {
        return $this->hasMany(Message::class)->orderByDesc('messages.created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function convertDateToTimestamp($fromDate = "", $toDate = "")
    {
        $from = 0;
        $to = time() + 86400;
        if (($fromDate != "") && ($toDate != "")) {
            $fr = explode("/", $fromDate);
            $to = explode("/", $toDate);
            $xc1 = CalendarUtils::toGregorian($fr['0'], $fr['1'], $fr['2']);
            $xc2 = CalendarUtils::toGregorian($to['0'], $to['1'], $to['2']);
            $from = strtotime(implode("-", $xc1));
            $to = strtotime(implode("-", $xc2)) + 86400;
            if ($from > $to) {
                return 0;
            }
        } elseif ($fromDate != "") {
            $fr = explode("/", $fromDate);
            $xc1 = CalendarUtils::toGregorian($fr['0'], $fr['1'], $fr['2']);
            $from = strtotime(implode("-", $xc1));
        } elseif ($toDate != "") {
            $to = explode("/", $toDate);
            $xc2 = CalendarUtils::toGregorian($to['0'], $to['1'], $to['2']);
            $to = strtotime(implode("-", $xc2)) + 86400;
        }
        return [$from, $to];
    }


}
