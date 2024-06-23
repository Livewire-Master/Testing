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

    public function test_task_is_pending_by_default()
    {
        $this->livewire()
            ->set('title', $this->title)
            ->set('description', $this->description)
            ->call('add')
            ->assertViewHas('tasks', function ($tasks) {
                return $tasks[0]['is_done'] === false;
            })
        ;
    }

    public function test_task_can_toggle()
    {
        $this->livewire()
            ->set('title', $this->title)
            ->set('description', $this->description)
            ->call('add')
            ->call('toggle', 0)
            ->assertViewHas('tasks', function ($tasks) {
                return $tasks[0]['is_done'] === true;
            })
            ->call('toggle', 0)
            ->assertViewHas('tasks', function ($tasks) {
                return $tasks[0]['is_done'] === false;
            })
        ;
    }

    public function test_validations_are_ok()
    {
        $this->livewire()
            ->set('title', '')
            ->set('description', '')
            ->call('add')
            ->assertHasErrors(
                [
                    'title' => ['required'],
                    'description' => ['required'],
                ]
            )
            ->set('title', 'a')
            ->set('description', 'a')
            ->call('add')
            ->assertHasErrors(
                [
                    'title' => ['min:3'],
                    'description' => ['min:3'],
                ]
            )
        ;
    }

    public function test_task_added_event_dispatched()
    {
        $this->livewire()
            ->set('title', $this->title)
            ->set('description', $this->description)
            ->call('add')
            ->assertDispatched('task-added')
        ;
    }
}
