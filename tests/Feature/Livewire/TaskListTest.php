<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TaskList;
use Livewire\Livewire;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    protected string $title = 'Go to gym';
    protected string $description = 'Nothing is more energiser that going to the gym';

    protected function livewire()
    {
        return Livewire::test(TaskList::class);
    }

    public function test_renders_successfully()
    {
        $this->livewire()->assertStatus(200);
    }

    public function test_title_and_description_set_successfully()
    {
        $this->livewire()
            ->set('title', $this->title)
            ->set('description', $this->description)
            ->assertSet('title', $this->title)
            ->assertSet('description', $this->description);
    }

    public function test_task_can_be_added_to_list()
    {
        $this->livewire()
            ->assertViewHas('tasks', function ($tasks) {
                return count($tasks) === 0;
            })
            ->set('title', $this->title)
            ->set('description', $this->description)
            ->call('add')
            ->assertViewHas('tasks', function ($tasks) {
                return count($tasks) === 1;
            });
    }
}
