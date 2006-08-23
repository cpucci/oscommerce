<?php
/*
  $Id: password.php 64 2005-03-12 16:36:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

  class osC_Info_Conditions extends osC_Template {

/* Private variables */

    var $_module = 'conditions',
        $_group = 'info',
        $_page_title,
        $_page_contents = 'info_conditions.php';

/* Class constructor */

    function osC_Info_Conditions() {
      global $osC_Services, $osC_Language, $breadcrumb;

      $this->_page_title = $osC_Language->get('info_conditions_heading');

      if ($osC_Services->isStarted('breadcrumb')) {
        $breadcrumb->add($osC_Language->get('breadcrumb_conditions'), osc_href_link(FILENAME_INFO, $this->_module));
      }
    }
  }
?>