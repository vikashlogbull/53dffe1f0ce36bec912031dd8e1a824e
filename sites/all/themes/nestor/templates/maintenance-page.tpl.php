<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */

?>

<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,700%7cBitter:400,700' rel='stylesheet' type='text/css'>
    <link href='<?php print $nestor_base_url; ?>/sites/default/files/fontyourface/font.css' rel='stylesheet' type='text/css' />
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    
    <div class="mainWrapper">

      <header class="bg-color-grayLight1">
        <div class="container">
          <div class="row">

            <?php if ($logo) : ?>
              <div id="logo-region" class="logo col-md-12 text-center">
                <a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive" /></a>
              </div> <!-- /logo-region -->
            <?php elseif ($site_name) : ?>
              <div id="logo-region" class="logo col-md-12 text-center">
                <a href="<?php print $front_page; ?>"><h1><?php print $site_name; ?></h1></a>
              </div> <!-- /logo-region -->
            <?php endif; ?>

          </div> <!-- /row -->
        </div> <!-- container -->
      </header>

      <div id="content-region" class="region">

        <div id="maintenance-content-block" class="maintenance-content block">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-offset-2 col-md-8 text-center">

                <?php if ($maintenanceOrConstruction === "maintenance") : ?>
                  <i class="icon ion-ios7-medkit-outline size-128 text-color-theme"></i>
                  <?php if ($title): ?>
                    <h2><b><?php print $title; ?></b></h2>
                  <?php endif; ?>
                <?php else : ?>
                  <i class="icon ion-ios7-time-outline size-128 text-color-theme"></i>
                  <h2><b><?php print t('Site under construction'); ?></b></h2>
                <?php endif; ?>
                
                <p><?php print $content; ?></p>                
              
              </div> <!-- /col-xs-12 -->
            </div> <!-- /row -->
          </div> <!-- /container -->
        </div> <!-- /maintenance-content-block -->

      </div> <!-- /content-region -->

      <div id="footer-columns-region" class="footer-columns region-30 block-30 bg-color-grayDark2 text-color-light">
        <div class="container">
          <div class="row">

            <div id="footer-first-column-region" class="footer-first-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-address-block" class="footer-address block">
                  <i class="icon ion-ios7-location-outline size-32 margin-bottom-20"></i>
                  <p>795 Fake Ave, Door 6<br />Wonderland, CA 94107</p>
                </div> <!-- /footer-address-block -->

              </div> <!-- /region -->
            </div> <!-- /footer-first-column-region -->

            <div id="footer-second-column-region" class="footer-second-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-mail-block" class="footer-mail block">
                  <i class="icon ion-ios7-email-outline size-32 margin-bottom-20"></i>
                  <p><a href="mailto:test@nestor.pt">info@nestor.pt</a><br /><a href="mailto:test@nestor.pt">support@nestor.pt</a></p>
                </div> <!-- /footer-mail-block -->

              </div> <!-- /region -->
            </div>  <!-- /footer-second-column-region -->

            <div id="footer-third-column-region" class="footer-third-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-phone-block" class="footer-phone block">
                  <i class="icon ion-ios7-telephone-outline size-32 margin-bottom-20"></i>
                  <p>+351123456789<br />+351987654321</p>
                </div> <!-- /footer-phone-block -->

              </div> <!-- /region -->
            </div>  <!-- /footer-third-column-region -->

          </div> <!-- /row -->
        </div> <!-- /container -->
      </div> <!-- /footer-columns-region -->

      <footer class="region-10 block-10 bg-color-grayDark1 text-color-light">
        <div class="container">
          <div class="row">

            <div id="footer-left-region" class="footer-left region-bottom-sm-0 col-xs-12 col-md-6 text-center-sm">
              <div class="region">

                <div id="copyright-block" class="block">
                  <p>Nestor was developed by <a href="http://leaftree.pt">leaftree</a></p>
                </div> <!-- /copyright-block -->

              </div> <!-- /region -->
            </div> <!-- /footer-left-region -->

            <div id="footer-right-region" class="footer-right region-top-sm-0 col-xs-12 col-md-6 text-right text-center-sm">
              <div class="region">

                <div id="social-networks-footer-block" class="social-networks-footer block">
                  <a href="http://facebook.com"><i class="icon ion-social-facebook"></i></a>
                  <a href="http://twitter.com"><i class="icon ion-social-twitter"></i></a>
                  <a href="http://linkedin.com"><i class="icon ion-social-linkedin"></i></a>
                  <a href="http://pinterest.com"><i class="icon ion-social-pinterest"></i></a>
                  <a href="http://vimeo.com"><i class="icon ion-social-vimeo"></i></a>
                  <a href="http://dribbble.com"><i class="icon ion-social-dribbble-outline"></i></a>
                  <a href="http://github.com"><i class="icon ion-social-github"></i></a>
                </div> <!-- /social-networks-footer -->

              </div> <!-- /region -->
            </div> <!-- /footer-right-region -->

          </div> <!-- /row -->
        </div> <!-- /container -->
      </footer>

    </div> <!-- /mainWrapper -->

    <?php print $scripts; ?>
    <!--[if lte IE 9]>
      <script src="<?php print $nestor_base_url; ?>/sites/all/themes/nestor/js/jquery.placeholder.js"></script>
    <![endif]-->
  </body>

</html>