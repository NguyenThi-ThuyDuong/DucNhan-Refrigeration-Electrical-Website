<?php
define('LIBRARIES', './libraries/');
require_once LIBRARIES . "config.php";
require_once LIBRARIES . "autoload.php";
new AutoLoad();

$func = new Functions(null);

// Force delete existing cached CSS first so setCache detects file size as 0 and rebuilds it
if (file_exists("assets/css/cached.css")) {
    unlink("assets/css/cached.css");
}

// Build CSS
$css = new CssMinify(false, $func);
$css->setCache("cached");
$css->setCss("./assets/css/animate.min.css");
$css->setCss("./assets/bootstrap/bootstrap.css");
$css->setCss("./assets/css/font-awesome.css");
$css->setCss("./assets/fancybox3/jquery.fancybox.css");
$css->setCss("./assets/fancybox3/jquery.fancybox.style.css");
$css->setCss("./assets/simplyscroll/jquery.simplyscroll.css");
$css->setCss("./assets/simplyscroll/jquery.simplyscroll-style.css");
$css->setCss("./assets/magiczoomplus/magiczoomplus.css");
$css->setCss("./assets/css/social.css");
$css->setCss("./assets/owlcarousel2/owl.carousel.css");
$css->setCss("./assets/owlcarousel2/owl.theme.default.css");
$css->setCss("./assets/slick/slick.css");
$css->setCss("./assets/slick/slick-theme.css");
$css->setCss("./assets/slick/slick-style.css");
$css->setCss("./assets/css/fonts.css");
$css->setCss("./assets/css/style.css");

$css->getCss();
clearstatcache();
echo "Built assets/css/cached.css successfully! (Size: " . filesize("assets/css/cached.css") . " bytes)\n";

// Force delete existing cached JS first so setCache detects file size as 0 and rebuilds it
if (file_exists("assets/js/cached.js")) {
    unlink("assets/js/cached.js");
}

// Build JS
$js = new JsMinify(false, $func);
$js->setCache("cached");
$js->setJs("./assets/js/jquery.min.js");
$js->setJs("./assets/bootstrap/bootstrap.js");
$js->setJs("./assets/js/wow.min.js");
$js->setJs("./assets/owlcarousel2/owl.carousel.js");
$js->setJs("./assets/magiczoomplus/magiczoomplus.js");
$js->setJs("./assets/simplyscroll/jquery.simplyscroll.js");
$js->setJs("./assets/slick/slick.js");
$js->setJs("./assets/fancybox3/jquery.fancybox.js");
$js->setJs("./assets/toc/toc.js");
$js->setJs("./assets/js/lazyload.min.js");
$js->setJs("./assets/js/functions.js");
$js->setJs("./assets/js/apps.js");

$js->getJs();
clearstatcache();
echo "Built assets/js/cached.js successfully! (Size: " . filesize("assets/js/cached.js") . " bytes)\n";
