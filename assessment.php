<?php
/*
* DotDev - PHP Developer Test
* Author: William
* Date Completed:
* Time taken: 0h 0m
* Remarks:
*   - Modules
*   - Errors Originally 'items' element of $order_items is one-dimensional array,
*     the keys 'id', 'value" and 'name' are duplicate, and so only the last item with the same key is available;
*     actually it should be two-dimensional array
*/

class StoreData {
    private $customers;

    private $orders;

    private $order_items;

    function __construct() {
    }

    public function loadData () {
        $customers = (object) [
            ['id' => 'BQYLCQ0CCwIOBgYNBAcACw', 'name' => 'Bob'],
            ['id' => 'CQwPDAkDDAQLBQsOBAcMBw', 'name' => 'Jan'],
            ['id' => 'AgsIBAsFAwYCCw8GBAINAQ', 'name' => 'Steve'],
            ['id' => 'DAEFDQwPDwMCCwULBAAMDg', 'name' => 'Fred'],
            ['id' => 'DQkCAAYHAAMJBA4LBAUOCg', 'name' => 'Robot']
        ];
        $orders = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506476504],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506480104],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'customerId' => 'CQwPDAkDDAQLBQsOBAcMBw', 'dateOrdered' => 1506562904],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'customerId' => 'CgUDCQ8IDAsIBwUBBAgIAA', 'dateOrdered' => 1507081304],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'customerId' => 'AgsIBAsFAwYCCw8GBAINAQ', 'dateOrdered' => 1509068504],
            ['id' => 'CQALBwoDAw0AAQgHBAEJBQ', 'customerId' => 'DAEFDQwPDwMCCwULBAAMDg', 'dateOrdered' => 1538012504]
        ];
        $order_items = (object) [
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
        $this->order_items = $order_items;
    }

    public function formatData ($option) {
        // All data should be returned as formatted JSON.

        $orders = $this->formatOrders();
        if ($option == 1) {
            // return orders sorted by highest value. Be sure to include the order total in the response
        } elseif ($option == 2) {
            // return orders sorted by date
            $this->sortOrdersByDate($orders);
        } elseif ($option == 3) {
            // return orders without items
        }
    }

    /**
     * @param $orders
     * @return array
     */
    private function sortOrdersByDate($orders) {
        foreach($orders as $val) {
            $dates[] = $val['dateOrdered'];
            $ordersArr[] = $val;
        }
        array_multisort($dates, $ordersArr);
        return $ordersArr;
    }


    /**
     * Get the values of a multi-dimensional array by a sub-key
     * @param $subkey string The sub-key whose values will be retrieved
     * @param $attr A multi-dimensional array
     * @return array Values of the sub-key
     */
    private function arrayValuesRecursive($subkey, array $arr){
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($subkey, &$val){
            if ($k == $subkey) {
                array_push($val, $v);
            }
        });
        return $val;
    }

    /**
     * return mixed[]
     * array structure: ['order1' => 100.00, 'order2' => 200.00]
     */
    private function getOrdersTotal() {
        $ordersTotal = [];
        foreach ($this->order_items as $order) {
            $ordersTotal[$order['id']] = $this->getItemsTotal($order['items']);
        }

        return $ordersTotal;
    }

    private function getItemsTotal(array $items) {
        $values = $this->arrayValuesRecursive('value', $items);
        return array_reduce($values, function ($total, $value) {
            $total += $value;
            return $total;
        });
    }

    private function formatCustomers() {
        foreach ($this->customers as $customer) {
            $arr[$customer['id']] = $customer;
        }

        return $arr;
    }

    private function formatOrderItems() {
        $orderItemsArray = [];
        foreach ($this->order_items as $order) {
            $orderItemsArray[$order['id']] = $order['items'];
        }

        return $orderItemsArray;
    }

    private function formatOrders() {
        $ordersTotal = $this->getOrdersTotal();
        $customersArray = $this->formatCustomers();
        $orderItemsArray = $this->formatOrderItems();

        $newOrders = [];
        foreach ($this->orders as $order) {
            $orderId = $order['id'];
            $newOrders[$orderId] = [
                'date' => $order['dateOrdered'],
                'total' => $ordersTotal[$orderId],
                'customer' => $customersArray[$order['customerId']],
                'order_items' => $orderItemsArray[$orderId]
            ];
        }

        return $newOrders;
    }}

/**
 * Is it running in CLI.
 * @return boolean
 */
function is_cli() {
    return $is_cli = in_array(PHP_SAPI, array('cli', 'cgi', 'cgi-fcgi'));
}

$running_cli = is_cli();
$eol = $running_cli ? PHP_EOL : '<br/>';

if (version_compare(phpversion(), '7.0.00', '<')) {
    echo 'The application needs to run on PHP 7 or higher.' . $eol;
}

$env = $running_cli ? 'CLI' : 'Browser';
// determine if the program is running via the CLI or browser
echo "The script is running from $env" . $eol;

if ($running_cli) {
    if ($argc !== 2) {
        die('The CLI script needs one and only one option' . $eol);
    }
    $option = $argv[1];
} else {
    $option = (int)$_GET['option'];
}

if (!in_array($option, [1, 2, 3])) {
    die('Invalid Parameter.');
}

$run = new StoreData();
$run->loadData();
$run->formatData($option);
