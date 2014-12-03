<?php

namespace Library\Logger\SLFactory;

use Library\Logger\Manager;
use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerSLFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Logger
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Manager $loggerManager */
        $loggerManager = $serviceLocator->get(Manager::class);

        return $loggerManager->createErrorInfoLog();
    }
}