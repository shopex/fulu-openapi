<?php

declare(strict_types=1);

namespace Test\FuluOpenApi;


use GuzzleHttp\Client;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Shopex\FuluOpenApi\Other;

/**
 * Class OtherTest
 * @package Test\FuluOpenApi
 * @internal
 * @covers \Shopex\FuluOpenApi\Other
 */
class OtherTest extends TestCase
{
    /**
     * @var Other
     */
    private $other;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $logger = new Logger("stdout");
        $logger->pushHandler(new StdoutHandler());
        $this->other = new Other(Contains::TEST_APP_KEY, Contains::TEST_SECRET, function() {
            return new Client([
                "base_uri" => Contains::TEST_GATEWAY,
            ]);
        }, $logger);
    }

    public function testFuluMobileInfoGet() {
        $response = $this->other->fuluMobileInfoGet(Contains::TEST_MOBILE, 1.00);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
    }
}