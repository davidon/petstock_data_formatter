<?php
declare(strict_types=1);

namespace App;

/**
 * Class StoreDataException
 *
 * To avoid using generic Exception
 */
class StoreDataException extends \Exception
{
    /**
     * StoreDataException constructor.
     *
     * @param string $message Error message
     * @param int $code Error Code
     */
    public function __construct($message, $code = 401) {
        parent::__construct($message, $code);
    }
}
