<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div class="main-wrapper <?php print $layout_version; ?>">
  
  <!-- Top Header Region -->
  
  <?php if ($page['top_header']) : ?>
    <div id="top-header-single-region" class="top-header-single region-5 block-5 <?php print $top_header_classes; ?>">
      <div class="container text-center">
        <?php if ($page['top_header']) { print render($page['top_header']); } ?>
      </div> <!-- /container -->
    </div> <!-- /top-header-single-region -->
  <?php endif; ?>
  
  <?php if ($page['top_header_left'] || $page['top_header_right']) : ?>
    <div id="top-header-region" class="top-header region-5 block-5 <?php print $top_header_classes; ?>">
      <div class="container">
        <div class="row">
          
          <div id="top-header-left-region" class="top-header-left region-bottom-sm-0 col-xs-12 col-md-6 text-center-sm">
            <?php if ($page['top_header_left']) { print render($page['top_header_left']); } ?>
          </div> <!-- /top-header-left-region -->
          
          <div id="top-header-right-region" class="top-header-right region-top-sm-0 col-xs-12 col-md-6 text-right text-center-sm">
            <?php if ($page['top_header_right']) { print render($page['top_header_right']); } ?>
          </div> <!-- /top-header-right-region -->

        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /top-header-region -->
  <?php endif; ?>
  
  <!-- /Top Header Region -->
   
  <!-- Header region -->

  <header class="<?php print $header_version; ?> region-0 block-0">
    <div class="container">
      <div class="row">
        
        <div id="logo-region" class="<?php print $logo_classes; ?>">
          <?php if ($logo) : ?>
          <a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="logo" /></a>
          <?php elseif ($site_name) : ?>
            <a href="<?php print $front_page; ?>" id="site-name"><h1><?php print $site_name; ?></h1></a>
          <?php endif; ?>
        </div> <!-- /logo-region -->
        
        <div id="menu-region" class="<?php print $header_classes; ?>">
          <?php if ($page['header']) { print render($page['header']); } ?>
        </div> <!-- /menu-region -->
        
      </div> <!-- /row -->
    </div> <!-- /container -->
  </header>
   
  <!-- /Header region -->
  
  
  <!-- Top content region -->
  <?php if (!$is_front) : ?>
  <div id="top-content-region" class="top-content padding-top-15 padding-bottom-15 block-15 bg-color-grayLight1">
    <div class="container">
      <div class="row">

        <div id="top-content-left-region" class="top-content-left col-xs-12 col-md-6 text-center-sm">

          <?php if ($title): ?>
            <div id="page-title-block" class="page-title block">
              <h1><?php print $title; ?></h1>
            </div> <!-- /page-title-block -->
          <?php endif; ?>

        </div> <!-- /top-content-left-region -->

        <?php if ($use_breadcrumbs === 'on') : ?>
          <div id="top-content-right-region" class="top-content-right col-xs-12 col-md-6 text-right text-center-sm">

            <div id="page-breadcrumbs-block" class="page-breadcrumbs block">
              <?php print $breadcrumb; ?>
            </div> <!-- /page-breadcrumbs-block -->

          </div> <!-- /top-content-right-region -->
        <?php endif; ?>
      
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /top-content-region -->
  <?php endif; ?>
  <!-- /Top content region -->
  
  
  <!-- Highlighted 1 region -->
  
  <?php if ($page['highlighted_1']) : ?>
    <div id="highlighted-1-region" class="highlighted region-0 block-0 <?php print $highlighted_1_classes; ?>" <?php print $h1_parallax_ratio; print $h1_parallax_offset; ?>>
      <?php if ($highlighted_1_wide === "off") : ?>
        <div class="container">
          <?php print render($page['highlighted_1']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['highlighted_1']); ?>
      <?php endif; ?>
    </div> <!-- /highlighted-1-region -->
  <?php endif; ?>
  
  <!-- /Highlighted 1 region -->

  <!-- Highlighted region -->
   
  <?php if ($page['highlighted_2']) : ?>
    <div id="highlighted-2-region" class="highlighted region-0 block-0 <?php print $highlighted_2_classes; ?>" <?php print $h2_parallax_ratio; print $h2_parallax_offset; ?>>
      <?php if ($highlighted_2_wide === "off") : ?>
        <div class="container">
          <?php print render($page['highlighted_2']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['highlighted_2']); ?>
      <?php endif; ?>
    </div> <!-- /highlighted-2-region -->
  <?php endif; ?>
   
  <!-- /Highlighted 2 region -->

  <!-- Help region -->
  
  <?php if ($page['help']) : ?>
    <div id="help-region">
      <div class="container">
        <!-- Rendering of the help region -->
        <?php print render($page['help']); ?>

        <!-- Rendering of the action links -->
        <?php if ($action_links): ?>
          <ul class="nav nav-pills">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>
      </div> <!-- /container -->
    </div> <!-- /help-region -->
  <?php endif; ?>
  
  <!-- /Help region -->
  
  <!-- Content, Sidebar First and Sidebar Second regions -->
  
  <div id="content-region">
    <div class="container">
      <div class="row">
  
        <!-- If the Sidebar First has content then it will be rendered -->

        <?php if ($page['sidebar_first']) : ?>
          <div id="sidebar-first-region" class="sidebar-first region-50 block-30 <?php print $sidebar_classes; ?> ">
            <?php print render($page['sidebar_first']); ?>
          </div> <!-- /sidebar-first-region -->
        <?php endif; ?>

        <!-- /Sidebar First region -->

        <!-- Rendering of the main content -->

        <div id="main-content-region" class="main-content <?php print $content_classes; ?>">
          
          <!-- Rendering the tabs to view and edit nodes -->
          <?php if ($tabs) : ?>
            <div id="admin-tabs" class="text-center">
              <?php print render($tabs); ?>
            </div> <!-- /admin-tabs -->
          <?php endif; ?>

          <!-- Output the messages -->
          <?php if ($messages) { print render($messages); } ?>

          <!-- Rendering the content -->
          <?php print render($page['content'])?>

          <!-- Printing the feed icons -->
          <?php print $feed_icons; ?>

        </div> <!-- /main-content-region -->

        <!-- /main content -->

        <!-- If the Sidebar Second has content then it will be rendered -->

        <?php if ($page['sidebar_second']) : ?>
          <div id="sidebar-second-region" class="sidebar-second region-50 block-30 <?php print $sidebar_classes; ?>">
            <?php print render($page['sidebar_second']); ?>
          </div> <!-- sidebar-second-region -->
        <?php endif; ?>

        <!-- /Sidebar Second region -->

      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /content-region -->

  <!-- /Content, Sidebar First and Sidebar Second regions -->
  
  <!-- Content 1 region -->

  <?php if ($page['content_1']) : ?>

    <div id="content-1-region" class="content-1 <?php print $content_1_classes; ?>" <?php print $c1_parallax_ratio; print $c1_parallax_offset; ?>>
      <?php if ($content_1_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_1']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_1']); ?>
      <?php endif; ?>
    </div> <!-- /content-1-region -->
  
  <?php endif; ?>
  
  <!-- /Content 1 region -->
  
  <!-- Content 2 region -->

  <?php if ($page['content_2']) : ?>

    <div id="content-2-region" class="content-2 <?php print $content_2_classes; ?>" <?php print $c2_parallax_ratio; print $c2_parallax_offset; ?>>
      <?php if ($content_2_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_2']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_2']); ?>
      <?php endif; ?>
    </div> <!-- /content-2-region -->
  
  <?php endif; ?>
  
  <!-- /Content 2 region -->
  
  <!-- Content 3 region -->

  <?php if ($page['content_3']) : ?>

    <div id="content-3-region" class="content-3 <?php print $content_3_classes; ?>" <?php print $c3_parallax_ratio; print $c3_parallax_offset; ?>>
      <?php if ($content_3_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_3']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_3']); ?>
      <?php endif; ?>
    </div> <!-- /content-3-region -->
  
  <?php endif; ?>
  
  <!-- /Content 3 region -->
  
  <!-- Content 4 region -->

  <?php if ($page['content_4']) : ?>

    <div id="content-4-region" class="content-4 <?php print $content_4_classes; ?>" <?php print $c4_parallax_ratio; print $c4_parallax_offset; ?>>
      <?php if ($content_4_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_4']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_4']); ?>
      <?php endif; ?>
    </div> <!-- /content-4-region -->
  
  <?php endif; ?>
  
  <!-- /Content 4 region -->
  
  <!-- Content 5 region -->

  <?php if ($page['content_5']) : ?>

    <div id="content-5-region" class="content-5 <?php print $content_5_classes; ?>" <?php print $c5_parallax_ratio; print $c5_parallax_offset; ?>>
      <?php if ($content_5_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_5']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_5']); ?>
      <?php endif; ?>
    </div> <!-- /content-5-region -->
  
  <?php endif; ?>
  
  <!-- /Content 5 region -->
  
  <!-- Content 6 region -->

  <?php if ($page['content_6']) : ?>

    <div id="content-6-region" class="content-6 <?php print $content_6_classes; ?>" <?php print $c6_parallax_ratio; print $c6_parallax_offset; ?>>
      <?php if ($content_6_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_6']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_6']); ?>
      <?php endif; ?>
    </div> <!-- /content-6-region -->
  
  <?php endif; ?>
  
  <!-- /Content 6 region -->
  
  <!-- Content 7 region -->

  <?php if ($page['content_7']) : ?>

    <div id="content-7-region" class="content-7 <?php print $content_7_classes; ?>" <?php print $c7_parallax_ratio; print $c7_parallax_offset; ?>>
      <?php if ($content_7_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_7']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_7']); ?>
      <?php endif; ?>
    </div> <!-- /content-7-region -->
  
  <?php endif; ?>
  
  <!-- /Content 7 region -->
  
  <!-- Content 8 region -->

  <?php if ($page['content_8']) : ?>

    <div id="content-8-region" class="content-8 <?php print $content_8_classes; ?>" <?php print $c8_parallax_ratio; print $c8_parallax_offset; ?>>
      <?php if ($content_8_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_8']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_8']); ?>
      <?php endif; ?>
    </div> <!-- /content-8-region -->
  
  <?php endif; ?>
  
  <!-- /Content 8 region -->
  
  <!-- Content 9 region -->

  <?php if ($page['content_9']) : ?>

    <div id="content-9-region" class="content-9 <?php print $content_9_classes; ?>" <?php print $c9_parallax_ratio; print $c9_parallax_offset; ?>>
      <?php if ($content_9_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_9']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_9']); ?>
      <?php endif; ?>
    </div> <!-- /content-9-region -->
  
  <?php endif; ?>
  
  <!-- /Content 9 region -->

  <!-- Content 10 region -->

  <?php if ($page['content_10']) : ?>

    <div id="content-10-region" class="content-10 <?php print $content_10_classes; ?>" <?php print $c10_parallax_ratio; print $c10_parallax_offset; ?>>
      <?php if ($content_10_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_10']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_10']); ?>
      <?php endif; ?>
    </div> <!-- /content-10-region -->
  
  <?php endif; ?>
  
  <!-- /Content 10 region -->

  <!-- Content 11 region -->

  <?php if ($page['content_11']) : ?>

    <div id="content-11-region" class="content-11 <?php print $content_11_classes; ?>" <?php print $c11_parallax_ratio; print $c11_parallax_offset; ?>>
      <?php if ($content_11_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_11']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_11']); ?>
      <?php endif; ?>
    </div> <!-- /content-11-region -->
  
  <?php endif; ?>
  
  <!-- /Content 11 region -->

  <!-- Content 12 region -->

  <?php if ($page['content_12']) : ?>

    <div id="content-12-region" class="content-12 <?php print $content_12_classes; ?>" <?php print $c12_parallax_ratio; print $c12_parallax_offset; ?>>
      <?php if ($content_12_wide === "off") : ?>
        <div class="container">
          <?php print render($page['content_12']); ?>
        </div>
      <?php else : ?>
        <?php print render($page['content_12']); ?>
      <?php endif; ?>
    </div> <!-- /content-12-region -->
  
  <?php endif; ?>
  
  <!-- /Content 12 region -->
  
  <!-- Map region -->
  
  <?php if ($page['map']) : ?>
    <div id="map-region" class="map region-0 block-0">
      <?php print render($page['map']); ?>
    </div> <!-- /map-region -->
  <?php endif; ?>
  
  <!-- /Map region -->

  <!-- Footer Columns region -->

  <?php if ($footer_columns > 0) : ?>
    <div id="footer-columns-region" class="footer-columns region-30 block-30 <?php print $footer_columns_classes; ?>">
      <div class="container">
        <div class="row">

          <?php if ($page['footer_first_column']) : ?>
            <div id="footer-first-column-region" class="footer-first-column <?php print $footer_class; ?>">
              <?php print render($page['footer_first_column']); ?>
            </div> <!-- /footer-first-column-region -->
          <?php endif; ?>
          
          <?php if ($page['footer_second_column']) : ?>
            <div id="footer-second-column-region" class="footer-second-column <?php print $footer_class; ?>">
              <?php print render($page['footer_second_column']); ?>
            </div> <!-- /footer-second-column-region -->
          <?php endif; ?>
          
          <?php if ($page['footer_third_column']) : ?>
            <div id="footer-third-column-region" class="footer-third-column <?php print $footer_class; ?>">
              <?php print render($page['footer_third_column']); ?>
            </div> <!-- /footer-third-column-region -->
          <?php endif; ?>

          <?php if ($page['footer_fourth_column']) : ?>
            <div id="footer-fourth-column-region" class="footer-fourth-column <?php print $footer_class; ?>">
              <?php print render($page['footer_fourth_column']); ?>
            </div> <!-- /footer-fourth-column-region -->
          <?php endif; ?>
        
        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /footer-columns-region -->
  <?php endif; ?>

  <!-- /Footer Columns region -->

  <!-- Footer region -->

  <?php if ($page['footer_left'] || $page['footer_right']) : ?>
    <footer class="region-10 block-10 <?php print $footer_classes; ?>">
      <div class="container">
        <div class="row">

          <?php if ($page['footer_left']) : ?>
            <div id="footer-left-region" class="footer-left region-bottom-sm-0 <?php print $f_left_classes; ?>">
              <?php print render($page['footer_left']); ?>
            </div> <!-- /footer-left-region -->
          <?php endif; ?>
          
          <?php if ($page['footer_right']) : ?>
            <div id="footer-right-region" class="footer-right region-top-sm-0 <?php print $f_right_classes; ?>">
              <?php print render($page['footer_right']); ?>
            </div> <!-- /footer-right-region -->
          <?php endif; ?>
        
        </div> <!-- /row -->
      </div> <!-- /container -->
    </footer>
  <?php endif; ?>
  
  <!-- /Footer region -->

</div> <!-- /main-wrapper -->

 <!-- Back to top button -->
  <?php
    if ($back_to_top == "on") { ?>
      <div id="back-to-top">
        <i class="ion-ios7-arrow-up"></i>
      </div>
  <?php } ?>
  <!-- End of Back to top button -->

<!-- Demo switcher -->
<?php
  if ($switcher === "on") {
    include('demo-switcher.html');
  }
?>
<!-- End of demo switcher -->