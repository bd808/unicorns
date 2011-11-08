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
if ($uIdx >= 0) {
  $BASE = substr($URI, 0, $uIdx) . '/unicorns';
} else {
  $BASE = '';
}

$sections = array(
    '' => 'Home',
    '/gallery' => 'Gallery',
    '/anatomy' => 'Anatomy',
    '/diet' => 'Diet',
    '/facts' => 'Facts',
    '/reproduction' => 'Reproduction',
  );
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
    <title><?php startblock('title'); echo ucwords($curr_sect); endblock('title'); ?> - UNICORNS!!</title>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $BASE;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $BASE;?>/css/site.css">
  </head>
  <body>
    <header>
    <div class="topbar" data-dropdown="dropdown" >
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
    <br><br><br>
    </header>
    <div class="container">
      <?php startblock('content'); ?>
<pre><code><?php
/*
echo "URI = {$URI}\n";
echo "WEBROOT = {$WEBROOT}\n";
echo "BASE = {$BASE}\n";
var_dump($_SERVER);
 */
      ?></code></pre>
      <?php endblock('content'); ?>
    </div>
    <footer class="footer">
      <div class="container">
        <p class="pull-right">this is the footer</p>
      </div>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="<?php echo $BASE;?>/js/application.js"></script>
  </body>
</html>
