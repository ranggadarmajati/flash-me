<?php 

if (! function_exists('flashMe')) {
    function flashMe() {
        return app('flashMe');
    }
}

if (! function_exists('flashMe_flash')) {
	function flashMe_flash(){
		$flash = '<link rel="stylesheet" type="text/css" href="' . config('flash_me.css') . '">';
		$flash .= '<script src="' . config('flash_me.js') . '"></script>';
		$flash .= '<script>';
		$flash .= 'iziToast.'.flashMe()->type().'({';
               $flash .= 'title: "' . flashMe()->title() . '",';
               $flash .= 'message: "' . flashMe()->message() . '",';
               if (is_array(flashMe()->options()) && sizeof(flashMe()->options()) > 0) {
               	foreach (flashMe()->options() as $key => $option) {
               		$flash .= $key . ': "' . $option . '",';
               	}
               }
          $flash .= '});';
          $flash .= '</script>';
          return $flash;
	}
}
