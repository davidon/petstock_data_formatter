<?php
declare(strict_types=1);

namespace Tests;

use App\StoreData;
use PHPUnit\Framework\TestCase;

class AssessmentTest extends TestCase
{
    public function testFilterEmptyOrder(): void
    {
        $store = new StoreData();
        $store->loadData();
        $formatedOrders = $store->formatData(3);
        $this->assertArrayHasKey('orders', $formatedOrders);
        $order = current(reset($formatedOrders));
        $this->assertArrayHasKey('order_items', $order);
        $this->assertSame([], $order['order_items']);
        $this->assertSame(0, $order['total']);
    }
}
