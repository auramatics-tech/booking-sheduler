<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name_ko', 'name_en', 'skype_id', 'zoom_url', 'phone', 'photo', 'user_id',
        'major', 'country', 'youtube_link', 'tags', 'introduction', 'cash_receipt_number'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getYoutubeLinkAttribute($youtube_link)
    {
        if (strlen($youtube_link) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_link, $match)) {
                return $match[1];
            } else
                return false;
        }

        return $youtube_link;
    }
}
