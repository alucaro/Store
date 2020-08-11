<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Order;


class OrderTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function create_order_test()
    {
        $order = Order::create([
            'customer_name' => 'test name',
            'customer_email' => 'test email',
            'customer_mobile' => 123456789,
            'status' => 'CREATED',
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'test name',
            'customer_email' => 'test email',
            'customer_mobile' => 123456789,
            'status' => 'CREATED',
        ]);
    }
}
