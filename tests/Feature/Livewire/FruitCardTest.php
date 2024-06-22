<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Fruit\Apple;
use App\Livewire\FruitCard;
use Livewire\Livewire;
use Tests\TestCase;

class FruitCardTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(FruitCard::class)
            ->assertStatus(200);
    }

    public function test_is_apple_component_exists()
    {
        Livewire::test(FruitCard::class)
            ->assertSee('Cards:')
            ->assertSeeLivewire(Apple::class);
    }

    public function test_version_is_one()
    {
        Livewire::test(FruitCard::class)
            ->assertViewHas('version', 1)
        ;
    }

    public function test_fruits_count_is_three()
    {
        Livewire::test(FruitCard::class)
            ->assertViewHas('fruits', function ($fruits)
            {
                return count($fruits) === 3;
            });
    }
}
