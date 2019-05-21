<?php 

namespace ClaudiusNascimento\Breadcrumb;

class BreadCrumb
{
	protected $crumbs = [];
	protected $config = [];

	/**
	 * [__construct set breadcrumb configuration]
	 */
	public function __construct() {

		$this->config = config('caubreadcrumb');
		
		if($this->config['use_automatic_home_breadcrumb'])
		{
			$label = $this->config['home_route_label'][\App::getLocale()];
			$url = route($this->config['home_route_name']);

			$this->add($label, $url);
		}

	}

	/**
	 * [clear Remove all breadcrumbs from array]
	 * @return [type] [void]
	 */
	public function clear()
	{
		$this->crumbs = [];
	}

	/**
	 * [add Add a breadcrumb item into array]
	 * @param [type] $label [String]
	 * @param string $url   [String]
	 */
	public function add($label, $url = '')
	{
		if(!is_string($label) || !is_string($url))
		{
			throw new \Exception('Params of Breadcrumb::add() must be of type string. "' . gettype($label) . '" and "' . gettype($url) . '" given', 1);
		}

		$this->crumbs[] = collect(['label' => $label, 'url' => $url]);
	}

	/**
	 * [display Shows breadcrumb]
	 * @return [type] [html]
	 */
	public function display() 
	{
		return view('breadcrumb::breadcrumb')->withBreads($this->getBreadCrumb())->render();
	}

	/**
	 * [display Shows breadcrumb]
	 * @return [type] [html]
	 */
	public function render() 
	{
		return $this->display();
	}

	/**
	 * [display Shows breadcrumb]
	 * @return [type] [html]
	 */
	public function show() 
	{
		return $this->display();
	}

	/**
	 * [getBreadCrumb Get the breadcrumb collection]
	 * @return [type] [Collection]
	 */
	public function getBreadCrumb()
	{
		return collect($this->crumbs);
	}
}