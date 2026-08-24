<?php

namespace App\Models;

use App\Models\Concerns\HasImageUrl;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'type',
    'holder_name',
    'bank_name',
    'account_number',
    'image',
    'phone',
    'address',
    'sort_order',
])]
class LoveGift extends Model
{
    /** @use HasFactory<Database\Factories\LoveGiftFactory> */
    use HasFactory, HasImageUrl;

    public const TYPE_TRANSFER = 'transfer';

    public const TYPE_QRIS = 'qris';

    public const TYPE_GIFT = 'gift';

    /**
     * @return array<string, string>
     */
    public static function types(): array
    {
        return [
            self::TYPE_TRANSFER => 'Transfer',
            self::TYPE_QRIS => 'Qris',
            self::TYPE_GIFT => 'Gift',
        ];
    }

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}
