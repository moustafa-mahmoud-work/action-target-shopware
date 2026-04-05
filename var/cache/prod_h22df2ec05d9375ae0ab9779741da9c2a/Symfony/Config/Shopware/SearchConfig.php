<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SearchConfig 
{
    private $termMaxLength;
    private $preservedChars;
    private $_usedProperties = [];

    /**
     * @default 300
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function termMaxLength($value): static
    {
        $this->_usedProperties['termMaxLength'] = true;
        $this->termMaxLength = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function preservedChars(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['preservedChars'] = true;
        $this->preservedChars = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('term_max_length', $config)) {
            $this->_usedProperties['termMaxLength'] = true;
            $this->termMaxLength = $config['term_max_length'];
            unset($config['term_max_length']);
        }

        if (array_key_exists('preserved_chars', $config)) {
            $this->_usedProperties['preservedChars'] = true;
            $this->preservedChars = $config['preserved_chars'];
            unset($config['preserved_chars']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['termMaxLength'])) {
            $output['term_max_length'] = $this->termMaxLength;
        }
        if (isset($this->_usedProperties['preservedChars'])) {
            $output['preserved_chars'] = $this->preservedChars;
        }

        return $output;
    }

}
