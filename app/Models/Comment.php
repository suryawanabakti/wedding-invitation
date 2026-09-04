<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'presence', 'body', 'is_hidden'])]
class Comment extends Model
{
    /** @use HasFactory<Database\Factories\CommentFactory> */
    use HasFactory;

    public const PRESENCE_UNCONFIRMED = 0;

    public const PRESENCE_ATTEND = 1;

    public const PRESENCE_ABSENT = 2;

    /**
     * @return array<int, string>
     */
    public static function presences(): array
    {
        return [
            self::PRESENCE_UNCONFIRMED => 'Konfirmasi Kehadiran',
            self::PRESENCE_ATTEND => "\u{2705} Datang",
            self::PRESENCE_ABSENT => "\u{274C} Berhalangan",
        ];
    }

    public function presenceLabel(): string
    {
        return self::presences()[$this->presence] ?? 'Konfirmasi Kehadiran';
    }

    protected function casts(): array
    {
        return [
            'presence' => 'integer',
            'is_hidden' => 'boolean',
        ];
    }
}
