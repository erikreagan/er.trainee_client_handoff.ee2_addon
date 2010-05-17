<?php

// We also have to reference the EE super object in our view file.
// Any outbound link from the CP needs to be masked so that the CP URL
// doesn't show up as a referral link.
// We use the cp->masked_url() function to create this masked link.

// See http://expressionengine.com/public_beta/docs/development/usage/cp.html#masked_url

$this->EE =& get_instance();

?>

<ul class="top">
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Vendor Support Portal</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Vendor Email</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Vendor Invoicing</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Vendor Website</a></li>
</ul>

<ul>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Additional Link 1</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Additional Link 2</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Additional Link 3</a></li>
   <li><a href="<?=$this->EE->cp->masked_url('#');?>">Additional Link 4</a></li>
</ul>