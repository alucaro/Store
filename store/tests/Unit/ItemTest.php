<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Item;


class ItemTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function create_item_test()
    {
        $item = Item::create([
            'name' => 'Test for a new item',
            'price' => 5000,
            'description' => 'This is a test for a new item',
        ]);

        $this->assertDatabaseHas('items', [
            'name' => 'Test for a new item',
            'price' => 5000,
            'description' => 'This is a test for a new item',
        ]);
    }
}
