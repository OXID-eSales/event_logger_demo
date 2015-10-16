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

use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;

class BasketItemLoggerTest extends PHPUnit_Framework_TestCase
{
    public function testLogsArticleAddingToBasket()
    {
        /** @var \Monolog\Logger|PHPUnit_Framework_MockObject_MockObject $logger */
        $logger = $this->getMock('Logger', array('addInfo'));
        $logger->expects($this->atLeastOnce())->method('addInfo')->with('Adding item with id \'10\'.');

        $basketComponent = new BasketItemLogger('test/path');
        $basketComponent->setLogger($logger);
        $basketComponent->logItemToBasket(10);
    }
}
