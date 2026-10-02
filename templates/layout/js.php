<!-- Js Config -->
<script type="text/javascript">
var NN_FRAMEWORK = NN_FRAMEWORK || {};
var CONFIG_BASE = '<?= $config_base ?>';
var WEBSITE_NAME =
    '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
var TIMENOW = '<?= date("d/m/Y", time()) ?>';
var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
var GOTOP = 'assets/images/top.png';
var LANG = {
    'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
    'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
    'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
    'wards': "<?= phuongxa ?>",
    'back_to_home': "<?= vetrangchu ?>",
};
</script>

<!-- Js Files -->
<?php
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

echo $js->getJs();
?>
<script src="./assets/js/lazyload.min.js"></script>

<script>
var myLazyLoad = new LazyLoad({
    elements_selector: ".lazy"
});
</script>

<?php if ($source == 'product') { ?>
<!-- SDK Facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0">
</script>
<?php } ?>

<?php if ($source != 'index') { ?>
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=647d994a8b79010019949b1a&product=inline-share-buttons&source=platform"
    async="async"></script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php if (!empty($type) && $type == 'script-main') { ?>
<!-- Like Share -->
<script src="//sp.zalo.me/plugins/sdk.js"></script>
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55e11040eb7c994c" async="async"></script>
<script type="text/javascript">
var addthis_config = addthis_config || {};
addthis_config.lang = 'vi'
</script>
<?php } ?>

<?php } ?>

<?php if ($template == 'index/index') { ?>

<script type="text/javascript">
$(document).ready(function() {
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        // asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        centerPadding: '0px',
        // asNavFor: '.slider-for',
        vertical: true,
        speed: 1000,
        autoplaySpeed: 2000,
        dots: false,
        centerMode: true,
        focusOnSelect: true
    });
});
</script>

<?php } ?>
<?php if ($template == 'duan/news_detail') { ?>
<script type='text/javascript' src='./assets/unitegallery/js/unitegallery.min.js'></script>
<script type='text/javascript' src='./assets/unitegallery/themes/tiles/ug-theme-tiles.js'></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#gallery").unitegallery({
        tiles_type: "justified"
    });
});
</script>
<?php } ?>

<script type="text/javascript">
// Tim kiem pc
const btnTim = document.querySelector('.btn_tim');
const close = document.querySelector('.menuli_close');
const form_search = document.querySelector('.menuli_form');
const btnClose = document.querySelector('.btn_close');

if (btnTim && close && form_search && btnClose) {
    btnTim.addEventListener('click', function() {
        document.querySelector('.frmtim').style.width = "30%";
        document.querySelector('.frmtim').style.opacity = "1";
        document.querySelector('.frmtim').style.visibility = "initial";
        document.getElementById("nut__tim").disabled = false;
        close.style.display = "block";
        form_search.style.display = "none";
    });
    btnClose.addEventListener('click', function() {
        document.querySelector('.frmtim').style.width = "0%";
        document.querySelector('.frmtim').style.opacity = "0";
        document.querySelector('.frmtim').style.visibility = "hidden";
        document.getElementById("nut__tim").disabled = true;
        close.style.display = "none";
        form_search.style.display = "block";
    });
}

// Tim kiem mobile
const closeSearch = document.querySelector('.close_search');
const openSearh = document.querySelector('.open_search');

if (closeSearch && openSearh) {
    openSearh.addEventListener('click', function() {
        document.querySelector('.frmtim1').style.width = "100%";
        document.querySelector('.frmtim1').style.opacity = "1";
        document.querySelector('.frmtim1').style.visibility = "initial";
        document.getElementById("nut__tim").disabled = false;
        closeSearch.style.display = "block";
        openSearh.style.display = "none";
    });
    closeSearch.addEventListener('click', function() {
        document.querySelector('.frmtim1').style.width = "0%";
        document.querySelector('.frmtim1').style.opacity = "0";
        document.querySelector('.frmtim1').style.visibility = "hidden";
        document.getElementById("nut__tim").disabled = true;
        openSearh.style.display = "block";
        closeSearch.style.display = "none";
    });
}
</script>


<script type="text/javascript">
$(document).ready(function() {

    jQuery(document).ready(function() {
        jQuery('.catagory-title').on("click", function() {
            if ($('.catagory-list__fix').css('display') == 'none') {
                $('.catagory-list__fix').animate({
                    height: 'show'
                }, 400);
            } else {
                $('.catagory-list__fix').animate({
                    height: 'hide'
                }, 200);
            }
        });
        jQuery('.catagory-list__fix li span').on("click", function() {
            let id = $(this).attr('data-id');
            if ($('#cat2__fix_' + id).css('display') == 'none') {
                $('#cat2__fix_' + id).animate({
                    height: 'show'
                }, 400);
            } else {
                $('#cat2__fix_' + id).animate({
                    height: 'hide'
                }, 200);
            }
        });
        jQuery('.catagory-list li span').on("click", function() {
            let id = $(this).attr('data-id');
            if ($('#cat2_' + id).css('display') == 'none') {
                $('#cat2_' + id).animate({
                    height: 'show'
                }, 400);
            } else {
                $('#cat2_' + id).animate({
                    height: 'hide'
                }, 200);
            }
        });
    });
});

$(document).ready(function() {
    // process bar
    window.addEventListener('load', function() {
        setTimeout(function() {

            $(".spinner").fadeOut();
            $("#preloader").delay(350).fadeOut("slow");
            // $("body").delay(350).css({
            //     overflow: "visible",

            // });
        }, 600);
    });

});
$(document).ready(function() {

    $('.support-content').hide();

    $('a.btn-support').click(function(e) {
        e.stopPropagation();
        $('.support-content').slideToggle();
    });
    $('.support-content').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('.support-content').slideUp();
    });

    $('.dangkyngay').click(function(e) {
        e.stopPropagation();
        $('#popup-form').modal('show');
    });

    $('.toc_news').hide();

    $('.icon_open').click(function(e) {
        e.stopPropagation();
        $('.toc_news').slideToggle();
    });

    // $('.dangkyngay1').click(function(e) {
    //     e.stopPropagation();
    //     $('#popup-form').modal('show');
    // });
    // $('.p4_wrap').click(function(e) {
    //     e.stopPropagation();
    //     $(this).toggleClass('active');
    // });

    $(".code_qr").click(function() {
        $(".show_code_qr").slideToggle();
    });
    $('.show_code_qr').hide();
    $('.tailvideo_item_owl').click(function() {
        let id = $(this).attr('data-src');
        let img = $(this).attr('data-image');
        let name = $(this).attr('data-name');
        $('.pic-video').attr('data-src', id);
        $('.pic-video img').attr('src', img);
        $('.name-video').html(name);
    });
});

$(document).on('click', '.menu_mobi .menulicha a', function(event) {
    $('.close_menu').trigger('click');
});

var menu_mobi = $('.menu_cap_cha').html();
$('.menu_mobi_add').append('<span class="close_menu">X</span><ul>' + menu_mobi + '</ul>');

$('.menu_mobi_add ul li ul').removeClass('menu_cap_con');
$('.menu_mobi_add ul li ul').css({
    'display': 'none'
});
$('.menu_mobi_add ul li ul li ul').removeClass('menu_cap_2');
$('.menu_mobi_add ul li ul li ul').css({
    'display': 'none'
});
$('.menu_mobi_add ul li ul li ul li ul').removeClass('menu_cap_3');
$('.menu_mobi_add ul li ul li ul li ul').css({
    'display': 'none'
});

$(".menu_mobi_add ul li").each(function(index, element) {
    if ($(this).children('ul').children('li').length > 0) {
        $(this).children('a').append('<i class="fas fa-chevron-right"></i>');
    }
});

$(".menu_mobi_add ul li a i").click(function() {
    if ($(this).parent('a').hasClass('active2')) {
        $(this).parent('a').removeClass('active2');
        if ($(this).parent('a').parent('li').children('ul').children('li').length > 0) {
           
            $(this).parent('a').parent('li').children('ul').hide(300);
            $(this).css({transform: 'rotate(0deg)',transition: '.3s'});
            return false;
        }
    } else {
        $(this).parent('a').addClass('active2');
        if ($(this).parents('li').children('ul').children('li').length > 0) {
            $(".menu_m ul li ul").hide(0);
            $(this).parents('li').children('ul').show(300);
            $(".menu_m ul li ul").css({
                display: 'none',
            });
            $(this).parents('li').children('ul').css({
                display: 'block',
            });
            $(this).css({transform: 'rotate(90deg)',transition: '.3s'});
            return false;
        }
    }
});

$('.icon_menu_mobi,.close_menu,.menu_baophu,.open-menu').click(function() {
    if ($('.menu_mobi_add').hasClass('menu_mobi_active')) {
        $('.menu_mobi_add').removeClass('menu_mobi_active');
        $('.menu_baophu').fadeOut(300);
    } else {
        $('.menu_mobi_add').addClass('menu_mobi_active');
        $('.menu_baophu').fadeIn(300);
    }
    return false;
});
</script>
<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
<!-- Js Google Recaptcha V3 -->
<script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>">
</script>
<script type="text/javascript">
// grecaptcha.ready(function() {


//     grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
//         action: 'contact'
//     }).then(function(token) {
//         var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
//         recaptchaResponseContact.value = token;
//     });
//     grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
//         action: 'Newsletter'
//     }).then(function(token) {
//         var recaptchaResponseNewsletter = document.getElementById('recaptchaResponseNewsletter');
//         recaptchaResponseNewsletter.value = token;
//     });

// });
</script>
<?php } ?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
<!-- Js OneSignal -->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script type="text/javascript">
var OneSignal = window.OneSignal || [];
OneSignal.push(function() {
    OneSignal.init({
        appId: "<?= $config['oneSignal']['id'] ?>"
    });
});
</script>
<?php } ?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
<?= $addons->getAddons(); ?>

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>