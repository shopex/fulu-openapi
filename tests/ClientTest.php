<?php

declare(strict_types=1);

namespace Test\FuluOpenApi;

use Mockery;
use phpDocumentor\Reflection\Types\Context;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
Use ReflectionMethod;
use Test\FuluOpenApi\Stub\Client;

/**
 * Class ClientTest
 * @package Test\FuluOpenApi
 * @internal
 * @covers \Shopex\FuluOpenApi\Client
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var ReflectionMethod
     */
    private $method;

    protected function setUp(): void
    {
        $this->client = new Client( Contains::TEST_APP_KEY, Contains::TEST_SECRET, function () {
            return Mockery::mock(\GuzzleHttp\Client::class);
        });
        $reflectionClass = new ReflectionClass(Client::class);
        $method = $reflectionClass->getMethod("resolveOptions");
        $method->setAccessible(true);
        $this->method = $method;
    }

    public function testResolveOptions()
    {
        $options = [
            "foo" => "bar",
            "hello" => "world",
            "php" => "test",
        ];

        $availableOptions = [
            "foo", "php",
        ];

        $result = $this->method->invoke($this->client, $options, $availableOptions);

        $excepted = [
            "foo" => "bar",
            "php" => "test",
        ];

        $this->assertSame($excepted, $result);
    }

    public function testResolveOptionsWithoutMatch()
    {
        $options = [
            "foo" => "bar",
        ];

        $availableOptions = [
            "hello", "php",
        ];

        $result = $this->method->invoke($this->client, $options, $availableOptions);

        $this->assertSame([], $result);
    }
}