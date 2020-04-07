<?php

namespace App\Tests\Controller;

use App\Controller\DefaultController;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Twig\Environment;

class DefaultControllerTest extends TestCase
{
    /**
     * @var MockObject|ContainerInterface
     */
    protected $container;

    /**
     * @var DefaultController
     */
    protected $controller;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->controller = new DefaultController();
        $this->container = $this->getMockBuilder(ContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller->setContainer($this->container);
    }

    public function testIndex()
    {
        $this->container->expects($this->once())
            ->method('has')
            ->willReturn(true);
        $this->container->expects($this->once())
            ->method('get')
            ->willReturn(
                $twig = $this->getMockBuilder(Environment::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );
        $this->controller->index();
    }
}
