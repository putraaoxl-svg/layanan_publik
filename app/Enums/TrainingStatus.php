<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum TrainingStatus: string implements HasLabel, HasColor
{
    case DRAFT = 'draft';
    case OPEN = 'open';
    case FULL = 'full';
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::OPEN => 'Pendaftaran Dibuka',
            self::FULL => 'Kuota Penuh',
            self::ONGOING => 'Sedang Berlangsung',
            self::COMPLETED => 'Selesai',
            self::CANCELLED => 'Dibatalkan',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DRAFT => 'gray',
            self::OPEN => 'success',
            self::FULL => 'warning',
            self::ONGOING => 'info',
            self::COMPLETED => 'success',
            self::CANCELLED => 'danger',
        };
    }
}
