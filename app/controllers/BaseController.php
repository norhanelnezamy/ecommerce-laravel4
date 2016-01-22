<?php

class BaseController extends Controller {

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array('getAddtocart', 'getCart', 'getRemoveitem')));
        $this->beforeFilter(function(){
             View::share('catenav',Category::all());
        });
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
