<?php
/**
 * This file is part of OXID eShop Demo Logger component.
 * Demo Logger component is free software:
 * you can redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation,
 * either version 3 of the License, or (at your option) any later version.
 *
 * Demo Logger component is distributed in
 * the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Demo Logger component.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @category      component
 * @author        OXID eSales AG
 * @link          http://www.oxid-esales.com/en/
 * @copyright (C) OXID e-Sales, 2003-2015
 */

namespace OxidEsales\EventLoggerDemo;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class logs items which goes to basket.
 */
class BasketItemLogger
{
    const FILE_NAME = 'basket.txt';

    const MESSAGE = 'Adding item with id \'%s\'.';

    const NAME = 'basket';

    /** @var Logger */
    private $logger;

    /** @var string */
    private $logsPath;

    /**
     * @param string $logsPath Path to logs directory.
     */
    public function __construct($logsPath)
    {
        $this->logsPath = $logsPath;
    }

    /**
     * Method logs items which goes to basket.
     *
     * @param string $itemId
     */
    public function logItemToBasket($itemId)
    {
        $this->getLogger()->addInfo(sprintf(static::MESSAGE, $itemId));
    }

    /**
     * @param Logger $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return Logger
     */
    protected function getLogger()
    {
        if (is_null($this->logger)) {
            $logger = new Logger(static::NAME);
            $logger->pushHandler(
                new StreamHandler(
                    $this->logsPath . DIRECTORY_SEPARATOR . static::FILE_NAME,
                    Logger::INFO
                )
            );
            $this->setLogger($logger);
        }

        return $this->logger;
    }
}
