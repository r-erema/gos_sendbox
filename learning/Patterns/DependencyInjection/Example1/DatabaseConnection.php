<?php

namespace learning\Patterns\DependencyInjection\Example1;

class DatabaseConnection
{

    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * DatabaseConnection constructor.
     * @param DatabaseConfiguration $configuration
     */
    public function __construct(DatabaseConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return string
     */
    public function getDsn(): string
    {
        return sprintf(
            '%s:%s@%s:%d',
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getHost(),
            $this->configuration->getPort()
        );
    }
}