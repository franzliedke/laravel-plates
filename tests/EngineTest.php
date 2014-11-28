<?php

namespace Fraznl\LaravelPlates\Test;

use Franzl\LaravelPlates\Engine;
use League\Plates\Engine as PlatesEngine;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class EngineTest extends \PHPUnit_Framework_TestCase
{
    /** @var Engine */
    protected $engine;

    /** @var MockObject|PlatesEngine */
    protected $platesEngine;

    public function setUp()
    {
        $this->platesEngine = $this->getMock('League\Plates\Engine', [], [], '', false);
        $this->engine = new Engine($this->platesEngine);
    }

    public function checkInitialization()
    {
        $this->assertInstanceOf('Illuminate\View\Engines\EngineInterface', $this->engine);
    }

    public function testGet()
    {
        $this->platesEngine->expects($this->once())
            ->method('getDirectory')
            ->willReturn('/var/www/app/views');

        $this->platesEngine->expects($this->once())
            ->method('getFileExtension')
            ->willReturn('plates.php');

        $template = '/var/www/app/views/index.plates.php';
        $data = array('foo' => 'bar');
        $renderedTemplate = '<h1>Hello Wold</h1>';

        $this->platesEngine->expects($this->once())
            ->method('render')
            ->with('index', $data)
            ->willReturn($renderedTemplate);

        $this->assertEquals($renderedTemplate, $this->engine->get($template, $data));
    }
} 