<?php

namespace App\Models;

use App\Models\Concerns\HasImageUrl;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'groom_short_name',
    'groom_full_name',
    'groom_title',
    'groom_father',
    'groom_mother',
    'groom_photo',
    'bride_short_name',
    'bride_full_name',
    'bride_title',
    'bride_father',
    'bride_mother',
    'bride_photo',
    'cover_photo',
    'background_image',
    'wedding_at',
    'akad_time',
    'resepsi_time',
    'address',
    'maps_url',
])]
class Wedding extends Model
{
    /** @use HasFactory<Database\Factories\WeddingFactory> */
    use HasFactory, HasImageUrl;

    protected function casts(): array
    {
        return [
            'wedding_at' => 'datetime',
        ];
    }

    /**
     * The couple names as displayed together, e.g. "Surya & Ade".
     */
    public function coupleNames(): string
    {
        return $this->groom_short_name.' & '.$this->bride_short_name;
    }

    /**
     * Google Calendar "add event" URL generated from the wedding date.
     */
    public function googleCalendarUrl(): string
    {
        $start = $this->wedding_at->copy()->setTimezone('UTC');
        $end = $start->copy()->addHours(4);

        $params = http_build_query([
            'action' => 'TEMPLATE',
            'text' => 'Pernikahan '.$this->coupleNames(),
            'dates' => $start->format('Ymd\THis\Z').'/'.$end->format('Ymd\THis\Z'),
            'details' => 'Akad nikah '.$this->akad_time.' dan Resepsi '.$this->resepsi_time.'.',
            'location' => $this->address,
        ]);

        return 'https://calendar.google.com/calendar/render?'.$params;
    }
}
