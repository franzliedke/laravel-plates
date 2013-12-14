<?php namespace Franzl\LaravelPlates;

use Illuminate\View\Engines\EngineInterface;
use League\Plates\Engine as PlatesEngine;
use League\Plates\Template;

class Engine extends PlatesEngine implements EngineInterface {

	/**
	 * Get the evaluated contents of the view.
	 *
	 * @param  string  $path
	 * @param  array   $data
	 * @return string
	 */
	public function get($path, array $data = array())
	{
		$path = substr($path, strlen($this->directory));
		$path = substr($path, 0, -strlen('.'.$this->fileExtension));

		$template = new Template($this);
		$template->data($data);

		return $template->render($path);
	}

}