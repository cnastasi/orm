<?php

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
use LaravelDoctrine\ORM\Configuration\MetaData\Yaml;
use Mockery as m;

class YamlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Yaml
     */
    protected $meta;

    protected function setUp()
    {
        $this->meta = new Yaml();
    }

    public function test_can_resolve()
    {
        $resolved = $this->meta->resolve([
            'paths'   => ['entities'],
            'dev'     => true,
            'proxies' => ['path' => 'path']
        ]);

        $this->assertInstanceOf(MappingDriver::class, $resolved);
        $this->assertInstanceOf(YamlDriver::class, $resolved);
    }

    protected function tearDown()
    {
        m::close();
    }
}
