<?php namespace Franzl\LaravelPlates;

use Illuminate\View\Engines\EngineInterface;
use League\Plates\Engine as PlatesEngine;
use League\Plates\Template;

class Engine implements EngineInterface
{
    /** @var PlatesEngine */
    private $engine;

    public function __construct(PlatesEngine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param  string  $path
     * @param  array   $data
     * @return string
     */
    public function get($path, array $data = array())
    {
        $path = substr($path, strlen($this->engine->getDirectory()));
        $path = substr($path, 0, -strlen('.'.$this->engine->getFileExtension()));

        return $this->engine->render($path, $data);
    }
}