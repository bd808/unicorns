<?php
/**
 * Base display template.
 */

// Path to root web content directory.
$WEBROOT = dirname(__FILE__);

// Path to php library files.
$LIBROOT = "{$WEBROOT}/lib";


// figure out base url of the site
$URI = $_SERVER['PHP_SELF'];

// look for first occurance of "unicorns"
$uIdx = strpos($URI, '/unicorns/');
if (false !== $uIdx) {
  $BASE = substr($URI, 0, $uIdx) . '/unicorns';
} else {
  $BASE = '';
}

// navigation generator:
// - key : uri from root of site to section
// - value : Name of section
$sections = array(
    '' => 'Home',
    '/gallery' => 'Gallery',
    '/anatomy' => 'Anatomy',
    '/diet' => 'Diet',
    '/facts' => 'Facts',
    '/reproduction' => 'Reproduction',
    '/habitat' => 'Habitat',
    '/behavior' => 'Behavior',
    '/communication' => 'Communication',
    '/culture' => 'Culture',
  );

// figure out what section the currnet page belongs to
list($curr_sect, $junk) = explode('/', substr($URI, strlen($BASE) + 1), 2);
if ('index.php' == $curr_sect) {
  $curr_sect = '';
} else {
  $curr_sect = "/{$curr_sect}";
}

// load template library
require_once "{$LIBROOT}/ti.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php startblock('title-full');
      startblock('title');
      // default title is same as section name
      echo @ucwords($sections[$curr_sect]);
      endblock('title'); ?> - UNICORNS!!<?php endblock('title-full');?></title>
    <!--[if lt IE 9]>
    <script src="<?php echo $BASE;?>/js/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $BASE;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $BASE;?>/css/site.css">
    <?php startblock('html-head'); endblock('html-head'); ?>
  </head>
  <body>
    <header>
      <div class="topbar">
        <div class="topbar-inner">
          <div class="container">
            <h3><a href="<?php echo $BASE;?>/">Unicorns!</a></h3>
            <ul class="nav">
  <?php foreach ($sections as $uri => $name) { ?>
              <li <?php if ($uri == $curr_sect) echo 'class="active"';?>>
                <a href="<?php echo $BASE, $uri;?>/"><?php echo $name; ?></a>
              </li>
  <?php } ?>
            </ul>
          </div>
        </div><!-- /topbar-inner -->
      </div><!-- /topbar -->
    </header>
    <div id="content" class="container"><?php startblock('content'); ?>
    <?php endblock('content'); ?></div>
    <footer class="footer">
      <div class="container">
        <p class="pull-right">this is the footer</p>
      </div>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="<?php echo $BASE;?>/js/application.js"></script>
    <?php startblock('body-end'); endblock('body-end'); ?>
  </body>
</html>
