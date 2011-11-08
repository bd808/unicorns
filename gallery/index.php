<?php require_once '../base.php'; ?>
<?php startblock('content'); ?>
<h1>Image Gallery</h1>
<div class="row">
  <div class="span16">
    <ul class="media-grid">
      <li>
      <a href="img1.php">
        <img class="thumbnail" width="210" src="img1.jpg">
      </a>
      </li>
      <li>
      <a href="img2.php">
        <img class="thumbnail" width="210" src="img2.jpg">
      </a>
      </li>
      <li>
      <a href="img3.php">
        <img class="thumbnail" width="210" src="img3.jpg">
      </a>
      </li>
      <li>
      <a href="img4.php">
        <img class="thumbnail" width="210" src="img4.jpg">
      </a>
      </li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="span10 offset1">
    <p>Please <a href="mailto:unicorns@casadebender.com">email us</a> with your best Unicorn shots!</p>
  </div>
</div>
<?php endblock('content'); ?>
