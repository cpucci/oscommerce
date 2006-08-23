<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  Released under the GNU General Public License
*/

  $Qreviews = osC_Reviews::getListing();
?>

<?php echo osc_image(DIR_WS_IMAGES . $osC_Template->getPageImage(), $osC_Template->getPageTitle(), null, null, 'id="pageIcon"'); ?>

<h1><?php echo $osC_Template->getPageTitle(); ?></h1>

<?php
  while ($Qreviews->next()) {
?>

<div class="moduleBox">
  <div style="float: right; margin-top: 5px;"><?php echo sprintf($osC_Language->get('review_date_added'), osC_DateTime::getLong($Qreviews->value('date_added'))); ?></div>

  <h6><?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, 'reviews=' . $Qreviews->valueInt('reviews_id') . '&' . $Qreviews->value('products_keyword')), $Qreviews->value('products_name')); ?> (<?php echo sprintf($osC_Language->get('reviewed_by'), $Qreviews->valueProtected('customers_name')); ?>)</h6>

  <div class="content">

<?php
    if (!osc_empty($Qreviews->value('image'))) {
      echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, 'reviews=' . $Qreviews->valueInt('reviews_id') . '&' . $Qreviews->value('products_keyword')), $osC_Image->show($Qreviews->value('image'), $Qreviews->value('products_name'), 'style="float: left;"'));
    }
?>

    <p style="padding-left: 100px;"><?php echo tep_break_string($Qreviews->valueProtected('reviews_text'), 60, '-<br />') . ((strlen($Qreviews->valueProtected('reviews_text')) >= 100) ? '..' : '') . '<br /><br /><i>' . sprintf($osC_Language->get('review_rating'), osc_image(DIR_WS_IMAGES . 'stars_' . $Qreviews->valueInt('reviews_rating') . '.gif', sprintf($osC_Language->get('rating_of_5_stars'), $Qreviews->valueInt('reviews_rating'))), sprintf($osC_Language->get('rating_of_5_stars'), $Qreviews->valueInt('reviews_rating'))) . '</i>'; ?></p>

    <div style="clear: both;"></div>
  </div>
</div>

<?php
  }
?>

<div class="listingPageLinks">
  <span style="float: right;"><?php echo $Qreviews->displayBatchLinksPullDown('page', 'reviews'); ?></span>

  <?php echo $Qreviews->displayBatchLinksTotal($osC_Language->get('result_set_number_of_reviews')); ?>
</div>