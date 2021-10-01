<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include_once ROOTPATH.'/app/Libraries/elfinder/php/autoload.php';
include_once 'assets/elfinder/php/autoload.php';

use elFinder;
use elFinderConnector;

class Elfinder_lib extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Settings_model');
		$this->load->model('Pages_model');
		$this->setting = $this->Settings_model->get_settings();

	}

  public function connect()
        {
			
		$opts = array(
        //'bind' => array('upload' => array($this, 'setToken')),
        'roots' => array(
         array( 
         'driver' => 'LocalFileSystem',
		 'copyOverwrite' => false,
		 'uploadOverwrite' => false,
        // 'path'  => ''.ROOTPATH . '/files/',
		 'path'  => 'files/',
         'URL' => ''.base_url('files').'/',
		// 'trashHash'     => 't1_Lw',// elFinder's hash of trash folder
		 'winHashFix'    => DIRECTORY_SEPARATOR !== '/', // to make hash same to Linux one on windows too
         'uploadDeny' => array('all'),                  // All Mimetypes not allowed to upload
         'uploadAllow' => array('all'),// Mimetype `image` and `text/plain` allowed to upload
         'uploadOrder' => array('deny', 'allow'), // allowed Mimetype `image` and `text/plain` only
		 'disabled'      => array('help','preference'),
         'accessControl' => array($this, 'access'),// disable and hide dot starting files (OPTIONAL)
           // more elFinder options here
            ) 
            )
          );
		 //define('ELFINDER_DEBUG_ERRORLEVEL', -1);	
		 //elFinder::$netDrivers['ftp'] = 'FTP';
         $connector = new elFinderConnector(new elFinder($opts));
         $connector->run();			
		exit();
        }
        
   public function access($attr, $path, $data, $volume, $isDir, $relpath) {
	  $basename = basename($path);
	   return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
			 && strlen($relpath) !== 1           // but with out volume root
		? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
		:  null;                                 // else elFinder decide it itself
      }
	
	
}
