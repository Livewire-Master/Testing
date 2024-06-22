<?php

namespace Tests\Feature\Livewire\Fruit;

use App\Livewire\Fruit\Apple;
use Livewire\Livewire;
use Tests\TestCase;

class AppleTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Apple::class)
            ->assertStatus(200);
    }

    public function test_items_are_correctly_present()
    {
        Livewire::test(Apple::class)
            ->assertSee('Title: Apple')
            ->assertSee('Emoji: 🍎')
            ->assertSee('Description:')
        ;
    }
}
