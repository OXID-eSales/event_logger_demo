Event logger demo component
===========================

This is a demo component which is used in module: https://github.com/OXID-eSales/loggerdemo

Installation
------------

Add these lines to modules/composer.json:

.. code:: json

  {
    "repositories": {
        "oxid-esales/event_logger_demo": {
            "type": "vcs",
            "url": "https://github.com/OXID-eSales/event_logger_demo.git"
        }
    },
    "require": {
        "oxid-esales/event_logger_demo": "dev-master"
    }
  }

Run installation command from modules directory:

.. code:: bash

  composer install
  
For OXID eShop version < 4.9.6/5.2.6
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
  
Include composer autoloader in modules/functions.php:

.. code:: php

  require_once dirname(__FILE__) . '/vendor/autoload.php';
  
Usage
-----

Add use of class:

.. code:: php

  use OxidEsales\EventLoggerDemo\BasketItemLogger;
  
Usage:

.. code:: php

  $basketItemLogger = new BasketItemLogger('/path/to/logs/directory');
  $basketItemLogger->logItemToBasket('product_id');
