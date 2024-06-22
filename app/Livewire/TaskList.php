<?php

namespace App\Livewire;

use Livewire\Component;

class TaskList extends Component
{
    public array $tasks = [];
    public string $title;
    public string $description;

    public function add(): void
    {
        $this->tasks[] = [
            'title' => $this->title,
            'description' => $this->description,
            'is_done' => false
        ];

        $this->reset('title', 'description');
    }

    public function toggle(int $id): void
    {
        $this->tasks[$id]['is_done'] = !$this->tasks[$id]['is_done'];
    }
}
