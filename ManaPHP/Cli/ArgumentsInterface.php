<?php
namespace ManaPHP\Cli;

/**
 * Interface ManaPHP\Cli\ArgumentsInterface
 *
 * @package ManaPHP\Cli
 */
interface ArgumentsInterface
{
    /**
     * @param array|string $arguments
     *
     * @return static
     */
    public function parse($arguments = null);

    /**
     * @param string|int $name
     * @param mixed      $default
     *
     * @return mixed
     */
    public function getOption($name = null, $default = null);

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasOption($name);

    /**
     * @param int $position
     *
     * @return string
     */
    public function getValue($position);

    /**
     * @return array
     */
    public function getValues();
}