<?php

namespace ManaPHP\Db;

interface QueryInterface extends \ManaPHP\QueryInterface
{
    /**
     * @param string $table
     * @param string $alias
     *
     * @return static
     */
    public function addFrom($table, $alias = null);

    /**
     * @param string|\ManaPHP\Db\QueryInterface $table
     * @param string                            $condition
     * @param string                            $alias
     * @param string                            $type
     *
     * @return static
     */
    public function join($table, $condition = null, $alias = null, $type = null);

    /**
     * @param string|\ManaPHP\Db\QueryInterface $table
     * @param string                            $condition
     * @param string                            $alias
     *
     * @return static
     */
    public function innerJoin($table, $condition = null, $alias = null);

    /**
     * @param string|\ManaPHP\Db\QueryInterface $table
     * @param string                            $condition
     * @param string                            $alias
     *
     * @return static
     */
    public function leftJoin($table, $condition = null, $alias = null);

    /**
     * @param string|\ManaPHP\Db\QueryInterface $table
     * @param string                            $condition
     * @param string                            $alias
     *
     * @return static
     */
    public function rightJoin($table, $condition = null, $alias = null);

    /**
     * @param string $filter
     * @param array  $bind
     *
     * @return static
     */
    public function whereRaw($filter, $bind = null);

    /**
     * @param string|array $having
     * @param array        $bind
     *
     * @return static
     */
    public function having($having, $bind = []);

    /**
     *
     * @param bool $forUpdate
     *
     * @return static
     */
    public function forUpdate($forUpdate = true);

    /**
     * @return string
     */
    public function getSql();

    /**
     * @param string $key
     *
     * @return array
     */
    public function getBind($key = null);

    /**
     * @param array $bind
     * @param bool  $merge
     *
     * @return static
     */
    public function setBind($bind, $merge = true);

    /**
     * @return array
     */
    public function getTables();

    /**
     * @param \ManaPHP\Db\QueryInterface[] $queries
     * @param bool                         $distinct
     *
     * @return static
     */
    public function union($queries, $distinct = false);
}