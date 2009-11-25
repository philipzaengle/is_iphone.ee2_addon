<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
  'pi_name' => 'is iPhone?',
  'pi_version' => '1.0',
  'pi_author' => 'Philip Zaengle',
  'pi_author_url' => 'http://www.philipzaengle.com/',
  'pi_description' => 'Detects if the user agent is that of an iphone',
  'pi_usage' => Is_Iphone::usage()
  );

/**
 *  Is iPhone Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Philip Zaengle
 * @copyright		Copyright (c) 2009, Philip Zaengle
 * @link			http://www.philipzaengle.com/expressionengine_addons/is_iphone
 */

class Is_Iphone
{

var $return_data = "";

	// --------------------------------------------------------------------

	/**
	 * is iPhone
	 *
	 * Returns data if iphone is the user agent
	 *
	 * @access	public
	 * @return	string or php header redirect
	 */

  function Is_Iphone()
  {
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== FALSE){

			$this->EE =& get_instance(); 
			$redirect = $this->EE->TMPL->fetch_param('redirect');
			
			if ($redirect != ""){
			  header("Location: ".$redirect ); exit;
			}
			else{
			  $this->return_data = $this->EE->TMPL->tagdata;
			}
		}
  }

	// --------------------------------------------------------------------

	/**
	 * Usage
	 *
	 * This function describes how the plugin is used.
	 *
	 * @access	public
	 * @return	string
	 */


  function usage()
  {
  ob_start(); 
  ?>
  
This plugin will detect if the user agent is that of an i
phone or ipod touch, and preform some action based on those results.

There are two options with this plugin

1) Use it to output something if the user agent is iPhone:
==========================================================
{exp:is_iphone}

Include your iphone/ipod touch only text, Javascript, or style-sheets here. 
 
{/exp:is_iphone}
==========================================================


2) Use it to redirect iPhone users to another page or site.

If you do chose to use this option the following code must 
be at the top of your templates. It must be the first thing 
output. Got it?
==========================================================
{exp:is_iphone redirect="/index.php/relative/path/"}
==========================================================

OR

==========================================================
{exp:is_iphone redirect="http://www.devot-ee.com"}
==========================================================

  <?php
  $buffer = ob_get_contents();
	
  ob_end_clean(); 

  return $buffer;
  }
  // END

}
/* End of file pi.is_iphone.php */ 
/* Location: ./system/expressionengine/third_party/memberlist/pi.is_iphone.php */