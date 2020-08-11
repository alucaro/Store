<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Transaction;
use App\Order;
use App\Item;


class TransactionTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function create_transaction_need_order_and_item_test()
    {
        $item = Item::create([
            'name' => 'Test for a new item',
            'price' => 5000,
            'description' => 'This is a test for a new item',
        ]);

        $order = Order::create([
            'customer_name' => 'test name',
            'customer_email' => 'test email',
            'customer_mobile' => 123456789,
            'status' => 'CREATED',
        ]);


        $transaction = Transaction::create([
            'order_id' => 1,
            'item_id' => 1,
            'cantidad' => 1,
            'total' => '5000',
            'id_transaction' => 123456789,
        ]);

        $this->assertDatabaseHas('transactions', [
            'order_id' => 1,
            'item_id' => 1,
            'cantidad' => 1,
            'total' => '5000',
            'id_transaction' => 123456789,
        ]);
    }
}
