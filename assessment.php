<?php
/*
 * DotDev - PHP Developer Test
 * Author: William
 * Date Completed:
 * Time taken: 3h 30m
 * Remarks:
 *   - Modules
 *    assessment.php under root folder is the main program to run from CLI or browser;
 *    artifacts.php holds the data objects, which is moved from assessment.php for better separation of concerns;
 *    app/ folder holds class files for data formatting and exception;
 *    tests/ folder holds unit test files;
 *    Docs/ folder holds running output result.
 *
 *    Installed PHPUnit using composer in order to make unit test.
 *
 *   - Errors Originally 'items' element of $order_items is one-dimensional array,
 *     the keys 'id', 'value" and 'name' are duplicate, and so only the last item with the same key is available;
 *     actually it should be two-dimensional array
 */
declare(strict_types=1);

use App\StoreData;

require_once("./vendor/autoload.php");

/**
 * Is it running in CLI.
 * (this function  and its calling are put outside StoreData class
 * because it doesn't fit the class's responsibility)
 *
 * @return boolean
 */
function is_cli()
{
    return in_array(PHP_SAPI, array('cli', 'cgi', 'cgi-fcgi'));
}

$running_cli = is_cli();
$eol = $running_cli ? PHP_EOL : '<br/>';

if (PHP_VERSION_ID < 70400) {
    echo 'The application needs to run on PHP 7.4 or higher.' . $eol;
}

$env = $running_cli ? 'CLI' : 'Browser';
// determine if the program is running via the CLI or browser
echo "The script is running from $env" . $eol;

if ($running_cli) {
    if ($argc !== 2) {
        die('The CLI script needs one and only one option' . $eol);
    }
    $option = (int)$argv[1];
} else {
    $option = (int)($_GET['option'] ?? null);
}

if (!in_array(
    $option,
    [StoreData::SORT_TOTAL, StoreData::SORT_DATE, StoreData::FILTER_EMPTY_ORDERS],
    true
)) {
    die('Invalid Parameter.');
}

try {
    $run = new StoreData();
    // All data should be returned as formatted JSON.
    echo json_encode($run->formatData($option));
} catch (Exception $e) {
    echo $e->getMessage();
}
