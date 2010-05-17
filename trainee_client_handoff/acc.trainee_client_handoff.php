<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Train-ee Client Handoff
 * 
 * This file must be placed in the
 * /system/expressionengine/third_party/trainee_client_handoff/ folder in your ExpressionEngine installation.
 *
 * @package TraineeClientHandoff
 * @version 1.0
 * @author Erik Reagan http://erikreagan.com
 * @copyright Copyright (c) 2010 Erik Reagan
 * @see http://erikreagan.com/projects/train-ee-client-handoff/
 * @license http://creativecommons.org/licenses/by-sa/3.0/ Attribution-Share Alike 3.0 Unported
 */



class Trainee_client_handoff_acc
{
   
   // Give your accessory whatever name you want here. It will be the text on the Accessory Tab
   // Note that it does not change the order of the Accessory tabs
   public   $name           = 'Train-ee Client Handoff';

   // This is the CSS ID name you can use to do any specific styling in the CP if you add custom stylesheets
   public   $id             = 'trainee_client_handoff';
   
   // As you update your accessory be sure to update the version number here
   public   $version        = '1.1';
   
   // This is the description that shows up on the Add-ons > Accessories page in the Control Panel
   public   $description    = 'Accessory Template for the client handoff of an EE 2.x project';
   
   // This is just to create the $sections array used further down in the code
   public   $sections       = array();

   
   
   
   /**
    * Constructor
    * The Constructor is a function inside the PHP Class that is run every time the Class object is created
    * @see http://www.php.net/manual/en/language.oop5.decon.php
    *
    * @access  public
    */
   function Trainee_client_handoff_acc()
   {
      
      // Reference the EE super object giving us accesss to EE's system info and classes
      // If you aren't using any of EE's classes you don't *need* to do this
      // We need it so we can use the view loader in the set_sections() method
      $this->EE =& get_instance();
      
   }



   /**
    * Set/Create sections of the Accessory
    *
    * @access     public
    * @return     void
    */
   public function set_sections()
   {
      
      // First let's add some custom styles to the CP header. We'll use the CSS ID defined above to just target *this* accessory
      $this->EE->cp->add_to_head('
      <style type="text/css" media="screen">
      #'.$this->id.' .accessorySection { width: 25%; }
      #'.$this->id.' .accessorySection ul.top { display: block; width: auto; overflow: auto; border-bottom: 1px solid #39454B; padding-bottom: 15px; margin-bottom: 15px; }
      #'.$this->id.' .accessorySection li { width: 50%; float: left; }
      </style>
      ');
      
      
      // This section shows how you can load a view file for your content
      // The first parameter, "quick_links", is the view file (located under views/quick_links.php)
      // The second parameter is your data variable passed to the view file. In our case we aren't passing any to this view
      // The third parameter tells CodeIgniter not to display the view, just to load it into the array $this->sections
      $this->sections['Client Links'] = $this->EE->load->view('quick_links',NULL,TRUE);
      
      
   
      
      // This section shows how you can hard-code in your content
      // Notice taht the section doesn't really need a title/heading
      // We also mask the url so the CP URL doesn't show up in any outside website tracking logs
      // See http://expressionengine.com/public_beta/docs/development/usage/cp.html#masked_url
      $this->sections[''] = '<a href="'.$this->EE->cp->masked_url('#').'"><img src="http://focuslabllc.com/images/vendor_logo.jpg" width="150" height="150" alt="Vendor Logo" title="You totally want to click me!" /></a>';
      

   }
   
   
}
// END class

/* End of file acc.trainee_client_handoff.php */
/* Location: ./system/expressionengine/third_party/trainee_client_handoff/acc.trainee_client_handoff.php */