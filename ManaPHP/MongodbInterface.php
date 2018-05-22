<?php
namespace ManaPHP;

interface MongodbInterface
{
    /**
     * Pings a server connection, or tries to reconnect if the connection has gone down
     *
     * @return bool
     */
    public function ping();

    /**
     * @param string $source
     * @param array  $document
     *
     * @return \MongoDB\BSON\ObjectID|int|string
     */
    public function insert($source, $document);

    /**
     * @param string $source
     * @param array  $document
     * @param array  $filter
     * @param array  $updateOptions
     *
     * @return int
     */
    public function update($source, $document, $filter, $updateOptions = []);

    /**
     * @param string $source
     * @param array  $filter
     * @param array  $deleteOptions
     *
     * @return int|null
     */
    public function delete($source, $filter, $deleteOptions = []);

    /**
     * @param string   $source
     * @param array    $filter
     * @param array    $options
     * @param bool|int $secondaryPreferred
     *
     * @return array
     */
    public function query($source, $filter = [], $options = [], $secondaryPreferred = true);

    /**
     * @param array  $command
     * @param string $db
     *
     * @return \Mongodb\Driver\Cursor
     */
    public function command($command, $db = null);

    /**
     * @param string $source
     * @param array  $pipeline
     * @param array  $options
     *
     * @return array
     */
    public function aggregate($source, $pipeline, $options = []);

    /**
     * @param string $source
     *
     * @return static
     */
    public function truncateTable($source);

    /**
     * @return array
     */
    public function listDatabases();

    /**
     * @param string $db
     *
     * @return array
     */
    public function listCollections($db = null);
}