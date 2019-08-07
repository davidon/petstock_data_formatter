<?php
declare(strict_types=1);

namespace App;

/**
 * Class StoreData
 *
 * Format data of customers' orders
 */
class StoreData
{
    /**
     * @var int Sort by total.
     */
    public const SORT_TOTAL = 1;

    /**
     * @var int Sort by order date.
     */
    public const SORT_DATE = 2;

    /**
     * @var int Filter orders which don't have order items.
     */
    public const FILTER_EMPTY_ORDERS = 3;

    /**
     * Customers
     *
     * @var object
     */
    private $customers;

    /**
     * Orders
     *
     * @var object
     */
    private $orders;

    /**
     * Items of Orders
     *
     * @var object
     */
    private $orderItems;

    /**
     * StoreData constructor.
     */
    function __construct()
    {
        $this->loadData();
    }

    /**
     * Load data.
     */
    private function loadData(): void
    {
        list($this->customers, $this->orders, $this->orderItems) = require(dirname(__DIR__) . '/artifacts.php');
    }

    /**
     * Format data
     *
     * @param $option
     *
     * @return mixed[]
     *
     * @throws \App\StoreDataException
     */
    public function formatData($option): array
    {
        $orders = $this->formatOrdersDetails();
        if ($option === self::SORT_TOTAL) {
            // return orders sorted by highest value. Be sure to include the order total in the response
            $formated = $this->sortOrdersByTotal($orders);
        } elseif ($option === self::SORT_DATE) {
            // return orders sorted by date
            $formated = $this->sortOrdersByDate($orders);
        } elseif ($option === self::FILTER_EMPTY_ORDERS) {
            // return orders without items
            $formated = $this->getEmptyOrders($orders);
        } else {
            throw new StoreDataException('Invalid option.');
        }

        return ['orders' => $formated];
    }

    /**
     * Format orders with detailed information.
     *
     * @return mixed[]
     */
    private function formatOrdersDetails(): array
    {
        $ordersTotal = $this->getOrdersTotal();
        $customersArray = $this->formatCustomers();
        $orderItemsArray = $this->formatOrderItems();

        $newOrders = [];
        foreach ($this->orders as $order) {
            $orderId = $order['id'];
            $newOrders[$orderId] = [
                'date' => $order['dateOrdered'],
                //If an order has no order items, then total is 0.
                'total' => $ordersTotal[$orderId] ?? 0,
                //If there's no customer's detail (not existing in customers object), then only customer's id included.
                'customer' => $customersArray[$order['customerId']] ?? ['id' => $order['customerId']],
                //If an order has no order items, then set items as empty array.
                'order_items' => $orderItemsArray[$orderId] ?? []
            ];
        }

        return $newOrders;
    }

    /**
     * Get orders total values.
     *
     * return mixed[]
     * array structure: ['order1' => 100.00, 'order2' => 200.00]
     */
    private function getOrdersTotal(): array
    {
        $ordersTotal = [];

        $details = array_values((array)$this->orderItems);
        array_walk($details, function ($order) use (&$ordersTotal) {
            $ordersTotal[$order['id']] = $this->getItemsTotal($order['items']);
        });

        /* another way to get the same total array, keep!
        $ordersTotal2 = array_reduce($details, function ($total, $order) {
            $total[$order['id']] = $this->getItemsTotal($order['items']);
            return $total;
        });
        */

        return $ordersTotal;
    }

    /**
     * Get total values of items.
     *
     * @param mixed[] $items
     *
     * @return float
     */
    private function getItemsTotal(array $items): float
    {
        return array_reduce(
            array_column($items, 'value'),
            function ($total, $value) {
                $total += $value;
                return $total;
            }
        );
    }

    /**
     * Format customers.
     *
     * @return mixed[]
     */
    private function formatCustomers(): array
    {
        //Cast customers object back to array.
        $customers = (array)$this->customers;
        return array_combine(
            array_column($customers, 'id'),
            $customers
        );
    }

    /**
     * Format order items.
     *
     * @return mixed
     */
    private function formatOrderItems(): array
    {
        $ordersItems = (array)$this->orderItems;
        return array_combine(
            array_column($ordersItems, 'id'),
            array_column($ordersItems, 'items')
        );
    }

    /**
     * Sort orders by total value
     *
     * @param mixed[] $orders
     *
     * @return array
     */
    private function sortOrdersByTotal(array $orders): array
    {
        return $this->sortOrdersBy($orders, 'total');
    }

    /**
     * Sort orders by the key.
     *
     * @param $orders
     * @param $key
     *
     * @return array
     */
    private function sortOrdersBy(array $orders, string $key): array
    {
        /* Solutoin 1, KEEP:
        uasort($orders, static function ($a, $b) use ($key) {
            return $a[$key] <=> $b[$key];
        });*/

        // Solution 2:
        array_multisort($orders, SORT_NUMERIC, array_column($orders, $key));
        return $orders;
    }

    /**
     * Sort orders by date
     *
     * @param mixed[] $orders
     *
     * @return array
     */
    private function sortOrdersByDate(array $orders): array
    {
        return $this->sortOrdersBy($orders, 'date');
    }

    /**
     * Get orders without order items.
     *
     * @param mixed[] $orders
     *
     * @return array
     */
    private function getEmptyOrders(array $orders): array
    {
        return array_filter($orders, function ($order) {
            return empty($order['order_items']);
        });
    }
}
