<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class TaskList extends Component
{
    public array $tasks = [];

    #[Rule(['required', 'string', 'min:3'])]
    public string $title;

    #[Rule(['required', 'string', 'min:3'])]
    public string $description;

    public function add(): void
    {
        $this->validate();

        $this->tasks[] = [
            'title' => $this->title,
            'description' => $this->description,
            'is_done' => false
        ];

        $this->reset('title', 'description');
        $this->dispatch('task-added');
    }

    public function toggle(int $id): void
    {
        $this->tasks[$id]['is_done'] = !$this->tasks[$id]['is_done'];
    }
}
