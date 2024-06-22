<?php

namespace App\Livewire;

use Livewire\Component;

class FruitCard extends Component
{
    public int $version = 1;

    public array $fruits;

    public function mount()
    {
        $this->fruits = [
            [
                'title' => 'apple',
            ],
            [
                'title' => 'orange'
            ],
            [
                'title' => 'banana'
            ]
        ];
    }
}
