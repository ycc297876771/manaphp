<?php

defined('UNIT_TESTS_ROOT') || require __DIR__ . '/bootstrap.php';

class CounterAdapterRedisTest extends TestCase
{
    protected $_di;
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->_di = new ManaPHP\Di\FactoryDefault();
        $this->_di->setShared('redis', function () {
            $redis = new \Redis();
            $redis->connect('localhost');
            return $redis;
        });
    }

    public function test_get()
    {
        $counter = new ManaPHP\Counter\Adapter\Redis();

        $counter->delete('c1');

        $this->assertEquals(0, $counter->_get('c1'));
        $counter->increment('c1');
        $this->assertEquals(1, $counter->_get('c1'));
    }

    public function test_increment()
    {
        $counter = new ManaPHP\Counter\Adapter\Redis();
        $counter->delete('c1');
        $this->assertEquals(2, $counter->_increment('c1', 2));
        $this->assertEquals(22, $counter->_increment('c1', 20));
        $this->assertEquals(2, $counter->_increment('c1', -20));
    }

    public function test_delete()
    {
        $counter = new ManaPHP\Counter\Adapter\Redis();
        $counter->_delete('c1');

        $counter->_increment('c1', 1);
        $counter->_delete('c1');
    }
}