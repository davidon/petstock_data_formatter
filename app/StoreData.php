<?php
namespace App;

class StoreData {
    /**
     * @var object
     */
    private $customers;

    /**
     * @var object
     */
    private $orders;

    /**
     * @var object
     */
    private $orderItems;

    /**
     * StoreData constructor.
     */
    function __construct()
    {
    }

    /**
     * Load data.
     */
    public function loadData (): void
    {
        // Keep data as object as this is how it should be.
        $customers = (object) [
            ['id' => 'BQYLCQ0CCwIOBgYNBAcACw', 'name' => 'Bob'],
            ['id' => 'CQwPDAkDDAQLBQsOBAcMBw', 'name' => 'Jan'],
            ['id' => 'AgsIBAsFAwYCCw8GBAINAQ', 'name' => 'Steve'],
            ['id' => 'DAEFDQwPDwMCCwULBAAMDg', 'name' => 'Fred'],
            ['id' => 'DQkCAAYHAAMJBA4LBAUOCg', 'name' => 'Robot']
        ];
        $orders = (object) [
            // In order to see the ordered result by date, prefixed a digit to the original dateOrdered values.
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 91506476504],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 71506480104],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'customerId' => 'CQwPDAkDDAQLBQsOBAcMBw', 'dateOrdered' => 51506562904],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'customerId' => 'CgUDCQ8IDAsIBwUBBAgIAA', 'dateOrdered' => 81507081304],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'customerId' => 'AgsIBAsFAwYCCw8GBAINAQ', 'dateOrdered' => 41509068504],
            ['id' => 'CQALBwoDAw0AAQgHBAEJBQ', 'customerId' => 'DAEFDQwPDwMCCwULBAAMDg', 'dateOrdered' => 61538012504]
        ];
        // All variables use camelCase.
        $orderItems = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 90.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 3.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,  'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 15.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 32.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ]
        ];

        $this->customers = $customers;
        $this->orders = $orders;
        $this->orderItems = $orderItems;
    }

    /**
     * Format data
     *
     * @param $option
     *
     * @return mixed[]
     */
    public function formatData ($option): array
    {
        $orders = $this->formatOrdersDetails();
        if ($option === 1) {
            // return orders sorted by highest value. Be sure to include the order total in the response
            $formated = $this->sortOrdersByTotal($orders);
        } elseif ($option === 2) {
            // return orders sorted by date
            $formated = $this->sortOrdersByDate($orders);
        } elseif ($option === 3) {
            // return orders without items
            $formated = $this->getEmptyOrders($orders);
        }

        $ordersFormated = ['orders' => $formated];

        return $ordersFormated;
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
        usort($orders, function ($a, $b) use ($key) {
            if ($a[$key] == $b[$key]) {
                return 0;
            }
            return ($a[$key] < $b[$key]) ? -1 : 1;
        });
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
        return $this->sortOrdersBy($orders,'date');
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
        return $this->sortOrdersBy($orders,'total');
    }

    /**
     * Get the values of a multi-dimensional array by a sub-key.
     *
     * @param $subkey string The sub-key whose values will be retrieved
     * @param $attr A multi-dimensional array
     *
     * @return array Values of the sub-key
     */
    private function array_values_recursive(string $subkey, array $arr): array
    {
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($subkey, &$val){
            if ($k == $subkey) {
                array_push($val, $v);
            }
        });
        return $val;
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
        foreach ($this->orderItems as $order) {
            $ordersTotal[$order['id']] = $this->getItemsTotal($order['items']);
        }

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
        $values = $this->array_values_recursive('value', $items);
        return array_reduce($values, function ($total, $value) {
            $total += $value;
            return $total;
        });
    }

    /**
     * Format order items.
     *
     * @return mixed
     */
    private function formatOrderItems(): array
    {
        $orderItemsArray = [];
        foreach ($this->orderItems as $order) {
            $orderItemsArray[$order['id']] = $order['items'];
        }

        return $orderItemsArray;
    }

    /**
     * Format customers.
     *
     * @return mixed[]
     */
    private function formatCustomers(): array
    {
        foreach ($this->customers as $customer) {
            $arr[$customer['id']] = $customer;
        }

        return $arr;
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
                //if an order has no order items, then total is 0
                'total' => $ordersTotal[$orderId] ?? 0,
                'customer' =>  $customersArray[$order['customerId']] ?? ['id' => $order['customerId']],
                //if an order has no order items, then set items as empty array
                'order_items' => $orderItemsArray[$orderId] ?? []
            ];
        }

        return $newOrders;
    }
}
