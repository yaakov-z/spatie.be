<?php

namespace App\Domain\Shop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class Release extends Model
{
    use HasFactory;

    public $guarded = [];

    public $casts = [
        'released' => 'bool',
        'released_at' => 'datetime',
    ];

    public static function booted()
    {
        static::saving(function (Release $release) {
            $release->notes_html = app(MarkdownRenderer::class)->toHtml($release->notes);
        });
    }

    /** @return BelongsTo<Product, $this> */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
