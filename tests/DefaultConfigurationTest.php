<?php

namespace Gcsc\LaravelApiResponse\Tests;

use Gcsc\LaravelApiResponse\ApiResponse;
use Gcsc\LaravelApiResponse\Tests\Fixtures\App;
use Illuminate\Contracts\Routing\ResponseFactory;
use PHPUnit\Framework\TestCase;

class DefaultConfigurationTest extends TestCase
{

    use \phpmock\phpunit\PHPMock;

    /** @test */
    public function valid_ok()
    {
        $env = $this->getFunctionMock('Gcsc\LaravelApiResponse', 'env');
        $env->expects($this->once())->willReturn(0);
        $config = $this->getFunctionMock('Gcsc\LaravelApiResponse', 'config');
        $config->expects($this->once())->willReturn(0);
        $app = $this->getFunctionMock('Gcsc\LaravelApiResponse', 'app');
        $app->expects($this->once())->willReturn(new App());


        $jsonResponse = $this->getMockBuilder('Illuminate\Http\JsonResponse')->getMock();
        $mock = $this->createMock(ResponseFactory::class);
        $mock->expects($this->once())
            ->method('json')
            ->with([
                'data' => [],
                'meta' => [
                    'version' => 0,
                    'environment' => 'test'
                ],
                'message' => 'OK',
            ])
            ->willReturn($jsonResponse);

        $responseFactory = $this->getFunctionMock('Gcsc\LaravelApiResponse', 'response');
        $responseFactory->expects($this->once())->willReturn($mock);

        $response = new ApiResponse();
        $response->ok();
    }
}
