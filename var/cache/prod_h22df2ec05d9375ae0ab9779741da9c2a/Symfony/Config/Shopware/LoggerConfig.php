<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LoggerConfig 
{
    private $fileRotationCount;
    private $excludeException;
    private $excludeEvents;
    private $errorCodeLogLevels;
    private $enforceThrowException;
    private $_usedProperties = [];

    /**
     * @default 14
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function fileRotationCount($value): static
    {
        $this->_usedProperties['fileRotationCount'] = true;
        $this->fileRotationCount = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function excludeException(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['excludeException'] = true;
        $this->excludeException = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function excludeEvents(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['excludeEvents'] = true;
        $this->excludeEvents = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function errorCodeLogLevels(string $name, mixed $value): static
    {
        $this->_usedProperties['errorCodeLogLevels'] = true;
        $this->errorCodeLogLevels[$name] = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enforceThrowException($value): static
    {
        $this->_usedProperties['enforceThrowException'] = true;
        $this->enforceThrowException = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('file_rotation_count', $config)) {
            $this->_usedProperties['fileRotationCount'] = true;
            $this->fileRotationCount = $config['file_rotation_count'];
            unset($config['file_rotation_count']);
        }

        if (array_key_exists('exclude_exception', $config)) {
            $this->_usedProperties['excludeException'] = true;
            $this->excludeException = $config['exclude_exception'];
            unset($config['exclude_exception']);
        }

        if (array_key_exists('exclude_events', $config)) {
            $this->_usedProperties['excludeEvents'] = true;
            $this->excludeEvents = $config['exclude_events'];
            unset($config['exclude_events']);
        }

        if (array_key_exists('error_code_log_levels', $config)) {
            $this->_usedProperties['errorCodeLogLevels'] = true;
            $this->errorCodeLogLevels = $config['error_code_log_levels'];
            unset($config['error_code_log_levels']);
        }

        if (array_key_exists('enforce_throw_exception', $config)) {
            $this->_usedProperties['enforceThrowException'] = true;
            $this->enforceThrowException = $config['enforce_throw_exception'];
            unset($config['enforce_throw_exception']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['fileRotationCount'])) {
            $output['file_rotation_count'] = $this->fileRotationCount;
        }
        if (isset($this->_usedProperties['excludeException'])) {
            $output['exclude_exception'] = $this->excludeException;
        }
        if (isset($this->_usedProperties['excludeEvents'])) {
            $output['exclude_events'] = $this->excludeEvents;
        }
        if (isset($this->_usedProperties['errorCodeLogLevels'])) {
            $output['error_code_log_levels'] = $this->errorCodeLogLevels;
        }
        if (isset($this->_usedProperties['enforceThrowException'])) {
            $output['enforce_throw_exception'] = $this->enforceThrowException;
        }

        return $output;
    }

}
