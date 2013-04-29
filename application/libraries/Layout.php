<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Layout Class
 *
 * Processes views in default layouts
 *
 * @subpackage Libraries
 * @author Reiny Júnior <reinyjunior@gmail.com>
 */
class Layout {
	
	/**
	 * Instance of global CI object
	 *
	 * @var object
	 * @access public
	 */
	private $_CI;

	/**
	 * Default layout name
	 *
	 * @var string
	 * @access public
	 */
	public $file = null;

	/**
	 * Default Layouts directory
	 *
	 * @var string
	 * @access public
	 */
	public $path = null;

	public function __construct()
	{
		// Get reference instance of global CI object.
		$this->_CI = &get_instance();

		// Load layout configuration
		$this->_CI->config->load('layout');

		// Helper path (use set_realpath function in path_exists method)
		$this->_CI->load->helper('path');

		// Default layout file name (application/config/layout.php)
		$this->file = $this->_CI->config->item('layout_file');

		// Layouts directory name (application/config/layout.php)
		$this->path = APPPATH . trim($this->_CI->config->item('layout_path'), '/');
	}

	/**
	 * Render
	 *
	 * Merge views and layout, and display content.
	 *
	 * @access public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	public function render($view, $data = null, $file = null)
	{
		$this->file_exists();

		$this->path_exists();

		$content = $this->output($view);

		require_once APPPATH . "/views/layouts/{$this->file}" . EXT;
	}

	/**
	 * File Exists
	 *
	 * This method check existence of layout file, if not, display default error.
	 *
	 * @access public
	 * @return	void
	 */
	private function file_exists()
	{
		$file = $this->path . DIRECTORY_SEPARATOR . $this->file . EXT;

		if( ! is_file($file))
		{
      show_error("Layout file \"{$this->file}\" do not exists !");
		}
	}

	/**
	 * Path Exists
	 *
	 * This method check existence of layouts directory, if not, display default error.
	 *
	 * @access public
	 * @return	void
	 */
	private function path_exists()
	{
		if( ! is_dir(set_realpath($this->path)))
		{
      show_error('Layout directory base do not exists !');
		}
	}

	/**
	 * Set Layout
	 *
	 * This method check set new layout base for class.
	 *
	 * @access public
	 * @return	void
	 */
	public function set_layout($file)
	{
		if( ! empty($file))
		{
			$this->file = $file;
		}
	}

	/**
	 * Output
	 *
	 * Get stream data form layout.
	 *
	 * @access public
	 * @return	void
	 */
	public static function output($view)
	{
			// get start stream data
	    ob_start();
	    require_once APPPATH . 'views/' .trim($view, '/') . EXT;
	    $content = ob_get_contents();
	    // clean buffer data
	    ob_end_clean();

	    return $content;
	}
}