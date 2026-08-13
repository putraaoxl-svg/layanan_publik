<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class FacilityPhoto extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['description'];

    protected $table = 'facility_photos';

    protected $fillable = [
        'facility_id',
        'description',
        'path',
        'sort',
    ];

    protected function casts(): array
    {
        return [
            'sort' => 'integer',
        ];
    }

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }
}
