<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TaskList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(TaskList::class)
            ->assertStatus(200);
    }
}
