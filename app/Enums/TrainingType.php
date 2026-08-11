<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TrainingType: string implements HasLabel
{
    case TECHNICAL = 'technical';
    case MANAGERIAL = 'managerial';
    case FUNCTIONAL = 'functional';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::TECHNICAL => 'Pelatihan Teknis',
            self::MANAGERIAL => 'Pelatihan Manajerial',
            self::FUNCTIONAL => 'Pelatihan Fungsional',
        };
    }
}
