<?php

namespace SimpleExampleApp\Application;

use function DI\object;
use DI\ContainerBuilder;
use SimpleExampleApp\Domain\PricesContextInterface;
use SimpleExampleApp\Domain\PricesContext;
use SimpleExampleApp\Domain\PricesRepositoryInterface;
use SimpleExampleApp\Infrastructure\RandomPricesRepository;

/**
 * Class for managing DI.
 */
class DependencyContainer extends ContainerBuilder
{
    /**
     * Constructor for dependency container.
     */
    public function __construct()
    {
        parent::__construct();
        $this->getDependencyConfiguration();
    }

    /**
     * Setup DI definitions.
     */
    private function getDependencyConfiguration()
    {
        $this->addDefinitions([
            PricesContextInterface::class => object(PricesContext::class),
            PricesRepositoryInterface::class => object(RandomPricesRepository::class),
        ]);
    }
}
