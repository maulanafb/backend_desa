<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    use UUID,SoftDeletes;

    protected $fillable = [
        "thumbnail",
        "name",
        "description",
        "price",
        "date",
        "time",
        "is_active",
    ];

    public function eventParticipants()
    {
        return $this->hasMany(EventParticipant::class);
    }
    public function headOfFamily()
    {
        return $this->belongsTo(HeadOfFamily::class);
    }
}
