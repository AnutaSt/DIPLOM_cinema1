<?php

namespace App\Livewire;

use App\Models\FilmSchedule;
use App\Models\Movie;
use Livewire\Component;

class WelcomePage extends Component
{
    public $schedule;
    public $dates;

    public function mount()
    {
        $this->schedule = FilmSchedule::whereRelation('hall', 'is_active', 1)->get();
        foreach ($this->schedule as $item) {
            $uniqueDates[] = date_parse($item->date_time)['day'];
        }
        if (isset($uniqueDates)) {
            sort($uniqueDates);
            $this->dates = array_unique($uniqueDates);
        }
    }

    public function shooseDate($date)
    {
        $this->schedule = FilmSchedule::where(date_parse('date_time')['day'], $date)->get();
    }

    public function render()
    {
        return view('livewire.welcome-page');
    }
}
