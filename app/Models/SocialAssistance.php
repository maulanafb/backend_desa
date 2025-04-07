<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistance extends Model
{
    //
    use UUID,SoftDeletes;

    protected $fillable = [
        "thumbnail",
        "name",
        "category",
        "amount",
        "provider",
        "description",
        "is_available",

    ];

    public function socialAssistanceRecipients()
    {
        return $this->hasMany(SocialAssistanceRecipient::class);
    }
}
