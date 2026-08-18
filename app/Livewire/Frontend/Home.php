<?php

namespace App\Livewire\Frontend;

use App\Models\Facility;
use App\Models\Training;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $trainings = Training::where('is_active', true)
            ->whereIn('status', ['open', 'ongoing'])
            ->orderBy('start_date', 'asc')
            ->get();

        $facilities = Facility::with('photos')
            ->where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();

        return view('livewire.frontend.home', [
            'trainings' => $trainings,
            'facilities' => $facilities,
        ])->layout('components.layouts.app');
    }
}
