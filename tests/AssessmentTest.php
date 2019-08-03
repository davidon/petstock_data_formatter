<?php
declare(strict_types=1);

namespace Tests;

use App\StoreData;
use App\StoreDataException;
use PHPUnit\Framework\TestCase;

/**
 * Class AssessmentTest
 *
 * Unit test of StoreData class
 *
 * @covers \App\StoreData
 */
class AssessmentTest extends TestCase
{
    /**
     * Test sorting by total values.
     *
     * @return void
     *
     * @throws \App\StoreDataException
     */
    public function testSortByTotal(): void
    {
        $store = new StoreData();
        $formatedOrders = $store->formatData(StoreData::SORT_TOTAL);
        $this->assertArrayHasKey('orders', $formatedOrders);
        $this->assertCount(6, $formatedOrders['orders']);

        $orderFirst = reset($formatedOrders['orders']);
        $this->assertSame(0, $orderFirst['total']);
        $this->assertArrayHasKey('order_items', $orderFirst);
        $this->assertSame([], $orderFirst['order_items']);

        $orderLast = end($formatedOrders['orders']);
        $this->assertSame(191.55, $orderLast['total']);
    }

    /**
     * Test sorting by ordered date.
     *
     * @return void
     *
     * @throws \App\StoreDataException
     */
    public function testSortByDate(): void
    {
        $store = new StoreData();
        $formatedOrders = $store->formatData(StoreData::SORT_DATE);
        $this->assertArrayHasKey('orders', $formatedOrders);
        $this->assertCount(6, $formatedOrders['orders']);
        $this->assertSame(
            [41509068504, 51506562904, 61538012504, 71506480104, 81507081304, 91506476504],
            array_column($formatedOrders['orders'], 'date')
        );
    }

    /**
     * Testing filtering out orders without order items.
     *
     * @return void
     *
     * @throws \App\StoreDataException
     */
    public function testFilterEmptyOrder(): void
    {
        $store = new StoreData();
        $formatedOrders = $store->formatData(StoreData::FILTER_EMPTY_ORDERS);
        $this->assertArrayHasKey('orders', $formatedOrders);
        $order = reset($formatedOrders['orders']);
        $this->assertArrayHasKey('order_items', $order);
        $this->assertSame([], $order['order_items']);
        $this->assertSame(0, $order['total']);
    }

    /**
     * Test exception is thrown when option is not valid.
     *
     * @return void
     *
     * @throws StoreDataException
     */
    public function testExceptionWhenInvalidOption(): void
    {
        $this->expectException(StoreDataException::class);
        $this->expectExceptionMessage('Invalid option.');
        $this->expectExceptionCode(401);
        $store = new StoreData();
        $store->formatData(4);

    }
}
