<?php
declare(strict_types=1);

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

return [$customers, $orders, $orderItems];
