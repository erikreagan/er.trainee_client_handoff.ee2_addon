<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Train-ee Client Handoff
 * 
 * This file must be placed in the
 * /system/expressionengine/third_party/trainee_client_handoff/ folder in your ExpressionEngine installation.
 *
 * @package TraineeClientHandoff
 * @version 1.0.0
 * @author Erik Reagan http://erikreagan.com
 * @copyright Copyright (c) 2010 Erik Reagan
 * @see http://erikreagan.com/projects/train-ee-client-handoff/
 * @see http://www.train-ee.com/courseware/free-tutorials/comments/client-handoff-resources/
 * @license http://creativecommons.org/licenses/by-sa/3.0/ Attribution-Share Alike 3.0 Unported
 *
 * @see http://expressionengine.com/public_beta/docs/development/accessories.html
 */



class Trainee_client_handoff_acc
{
   
   // Give your accessory whatever name you want here. It will be the text on the Accessory Tab
   // Note that it does not change the order of the Accessory tabs
   public   $name           = 'Vendor Name Portal';

   // This is the CSS ID name you can use to do any specific styling in the CP if you add custom stylesheets
   public   $id             = 'trainee_client_handoff';
   
   // As you update your accessory be sure to update the version number here
   public   $version        = '1.0.0';
   
   // This is the description that shows up on the Add-ons > Accessories page in the Control Panel
   public   $description    = 'Train-ee Accessory template for the client handoff of an EE 2.x project';
   
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
   // END function Trainee_client_handoff_acc()
   


   /**
    * Set/Create sections of the Accessory
    *
    * @access     public
    * @return     void
    */
   public function set_sections()
   {
      
      // First let's add some custom styles to the CP header. We'll use the CSS ID defined above to just target *this* accessory
      // We'll also add some simple jQuery to spice up our logo a bit. Completely unnecessary of course :)
      
      /**
       * @see http://expressionengine.com/public_beta/docs/development/usage/cp.html#add_to_head
       */
      $this->EE->cp->add_to_head('
      
      <style type="text/css" media="screen">
         #'.$this->id.' .accessorySection { width: 350px; }
         #'.$this->id.' .accessorySection ul.top { display: block; width: auto; overflow: auto; border-bottom: 1px solid #39454B; padding-bottom: 15px; margin-bottom: 15px; }
         #'.$this->id.' .accessorySection li { width: 50%; float: left; }
         #'.$this->id.' .accessorySection li a { display: block; }
      </style>
      
      <script type="text/javascript">
         $(function(){
            $("#'.$this->id.' .accessorySection img").css("opacity",.5).hover(
               function(){
                  $(this).stop().animate({opacity:1},300);
               },
               function(){
                  $(this).stop().animate({opacity:.5},200);
               }
            );
         });
      </script>
      
      ');
      
      
      // This section shows how you can load a view file for your content
      // The first parameter, "quick_links", is the view file (located under views/quick_links.php)
      // The second parameter is your data variable passed to the view file. In our case we aren't passing any to this view
      // The third parameter tells CodeIgniter not to display the view, just to load it as data (then EE displays it at the right time)
      // 
      // I prefer to load view files when the data (HTML) is more than just a few lines. It keeps the
      // accessory file cleaner and easier to read. It also makes it easier to modify later.
      
      /**
       * @see http://expressionengine.com/public_beta/docs/development/modules.html#view_files
       */
      $this->sections['Client Links'] = $this->EE->load->view('quick_links',NULL,TRUE);
      
      // Here we'll load a screencast teaching our client something. (also a view file)
      $this->sections['Video: How to Add an Image'] = $this->EE->load->view('video_embed',NULL,TRUE);
   
      
      // This section shows how you can hard-code in your content
      // Notice that the section doesn't really need a title/heading
      // We also mask the url so the CP URL doesn't show up in any outside website tracking logs
      // See http://expressionengine.com/public_beta/docs/development/usage/cp.html#masked_url
      // 
      // When just adding 1 or 2 lines of data (HTML), I'll just add it straight in the accessory file rather
      // than loading a separate view file. A separate view would seem like overkill in this case.
      $this->sections[''] = '<a href="'.$this->EE->cp->masked_url('#').'"><img src="http://focuslabllc.com/images/vendor_logo.jpg" width="150" height="150" alt="Vendor Logo" title="You totally want to click me!" /></a>';
      

   }
   // END function set_sections()
   
}
// END class Trainee_client_handoff_acc


/* End of file acc.trainee_client_handoff.php */
/* Location: ./system/expressionengine/third_party/trainee_client_handoff/acc.trainee_client_handoff.php */