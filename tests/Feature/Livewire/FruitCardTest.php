<?php

namespace Tests\Feature\Livewire;

use App\Livewire\FruitCard;
use Livewire\Livewire;
use Tests\TestCase;

class FruitCardTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(FruitCard::class)
            ->assertStatus(404);
    }
}
