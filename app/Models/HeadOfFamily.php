<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadOfFamily extends Model
{
    use UUID,SoftDeletes;
    //

    protected $fillable = [
        'user_id',
        'profile_picture',
        'identity_number',
        'gender',
        'date_of_birth',
        'phone_number',
        'occupation',
        'marital_status',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function familyMembers(): HasMany {
        return $this->hasMany(FamilyMember::class);
    }

    public function socialAssistanceRecipient(): HasMany {
        return $this->hasMany(SocialAssistanceRecipient::class);
    }
    public function socialAssistance(): HasMany {
        return $this->hasMany(SocialAssistance::class);
    }

    public function eventParticipants(): HasMany {
        return $this->hasMany(EventParticipant::class);
    }
}
