<?php
    $email_display = !empty($optsetting['email']) ? $optsetting['email'] : 'dinh.np@ducnhan.com.vn';
    $diachi_display = !empty($optsetting['diachi']) ? $optsetting['diachi'] : '965/36/2 Quang Trung, Phường An Hội Tây, TP.HCM';
    $hotline_display = !empty($optsetting['hotline']) ? $optsetting['hotline'] : (!empty($optsetting['dienthoai']) ? $optsetting['dienthoai'] : '0976 968 048 - 0909165478');
    $company_name = !empty($setting['ten' . $lang]) ? $setting['ten' . $lang] : 'CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐỨC NHÂN';
    
    // Dynamic Logo from Admin (table #_photo, type=logo)
    $logo_img = '';
    if (!empty($logo['photo']) && file_exists(UPLOAD_PHOTO_L . $logo['photo'])) {
        $logo_img = UPLOAD_PHOTO_L . $logo['photo'];
    } elseif (file_exists('upload/photo/logo.png')) {
        $logo_img = 'upload/photo/logo.png';
    } else {
        $logo_img = 'assets/images/logo.png';
    }
    $logo_alt = !empty($logo['ten' . $lang]) ? $logo['ten' . $lang] : 'Cơ Điện Lạnh Đức Nhân';
?>
<!-- TOP HEADER -->
<div class="header-cachtop bg-white py-2 border-bottom">
    <div class="fixwidth d-flex justify-content-between align-items-center" style="min-height: 65px;">
        <!-- BRAND LOGO & TITLE -->
        <div class="header_left d-flex align-items-center" style="flex: 1; min-width: 0;">
            <a href="./" class="d-flex align-items-center text-decoration-none">
                <img src="<?= $logo_img ?>" alt="<?= $logo_alt ?>" class="header-brand-logo mr-2 mr-sm-3" onerror="this.src='assets/images/noimage.png';">
                <span class="header-brand-title font-weight-bold text-uppercase" style="color: #0e5380; letter-spacing: 0.3px; font-family: Arial, Helvetica, sans-serif; line-height: 1.3;">
                    <?= $company_name ?>
                </span>
            </a>
        </div>
        
        <!-- CONTACT INFO RIGHT (Shown on Desktop >= 1200px) -->
        <div class="header_right d-none d-xl-flex align-items-center ml-3" style="font-size: 13px; font-weight: 500; white-space: nowrap;">
            <div class="contact-item d-flex align-items-center mr-4">
                <i class="fas fa-envelope text-dark mr-2" style="font-size: 18px;"></i>
                <a href="mailto:<?= $email_display ?>" class="text-dark border-bottom border-dark text-decoration-none pb-1">
                    <?= $email_display ?>
                </a>
            </div>
            <div class="contact-item d-flex align-items-center">
                <i class="fas fa-map-marker-alt text-dark mr-2" style="font-size: 20px;"></i>
                <span class="text-dark font-weight-normal"><?= $diachi_display ?></span>
            </div>
        </div>
    </div>
</div>

<!-- MENU -->
<div class="header-height" style="height: 52px;">
    <div id="menu_top" style="background-color: #0e5380; height: 52px;">
        <div class="navbar-full-wrapper d-flex justify-content-between align-items-stretch w-100 h-100">
            <!-- Desktop Menu -->
            <div class="menu desktop-menu-wrapper align-items-stretch h-100">
                <ul class="menu_cap_cha d-flex m-0 p-0 list-unstyled align-items-stretch h-100">
                    <li class="menulicha d-flex align-items-stretch <?= ($source == 'index' || empty($com)) ? 'active' : '' ?>">
                        <a href="./" title="TRANG CHỦ" class="d-flex align-items-center text-white font-weight-bold text-uppercase text-decoration-none">TRANG CHỦ</a>
                    </li>
                    <li class="menulicha d-flex align-items-stretch <?= ($com == 'gioi-thieu') ? 'active' : '' ?>">
                        <a href="gioi-thieu" title="GIỚI THIỆU" class="d-flex align-items-center text-white font-weight-bold text-uppercase text-decoration-none">GIỚI THIỆU</a>
                    </li>
                    <li class="menulicha d-flex align-items-stretch <?= ($com == 'du-an') ? 'active' : '' ?>">
                        <a href="du-an" title="DỰ ÁN" class="d-flex align-items-center text-white font-weight-bold text-uppercase text-decoration-none">DỰ ÁN</a>
                    </li>
                    <li class="menulicha d-flex align-items-stretch <?= ($com == 'lien-he') ? 'active' : '' ?>">
                        <a href="lien-he" title="LIÊN HỆ" class="d-flex align-items-center text-white font-weight-bold text-uppercase text-decoration-none">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
            
            <!-- Button -->
            <div class="header-button desktop-menu-button align-items-stretch h-100">
                <a href="gioi-thieu" class="btn-hsnl-full d-flex align-items-center text-white font-weight-bold text-uppercase text-decoration-none h-100">
                    XEM HỒ SƠ NĂNG LỰC <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Mobile Nav Bar -->
            <div class="mobile-nav-bar justify-content-between align-items-center w-100 px-3 h-100">
                <button type="button" class="btn-hamburger d-flex align-items-center text-white bg-transparent border-0 p-0" id="hamburger_btn" aria-label="Toggle Navigation Menu" style="cursor: pointer; outline: none; height: 52px;">
                    <i class="fas fa-bars mr-2" style="font-size: 20px;"></i>
                    <span class="font-weight-bold text-uppercase" style="font-size: 14px; letter-spacing: 0.8px;">MENU</span>
                </button>
                <a href="gioi-thieu" class="btn text-white font-weight-bold text-uppercase px-3 py-2" style="background-color: #e53935; border-radius: 4px; font-size: 12px; letter-spacing: 0.4px; white-space: nowrap;">
                    XEM HỒ SƠ NĂNG LỰC <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE SLIDE-OUT DRAWER MENU -->
<div class="mobile-drawer-overlay" id="mobile_drawer_overlay"></div>
<div class="mobile-drawer" id="mobile_drawer">
    <div class="mobile-drawer-header d-flex justify-content-between align-items-center p-3 text-white" style="background-color: #0e5380;">
        <span class="font-weight-bold text-uppercase" style="font-size: 15px; letter-spacing: 0.5px;">
            <i class="fas fa-bars mr-2"></i> DANH MỤC
        </span>
        <button type="button" class="mobile-drawer-close text-white bg-transparent border-0" id="mobile_drawer_close" aria-label="Close Menu" style="font-size: 24px; cursor: pointer; line-height: 1; outline: none;">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="mobile-drawer-body">
        <ul class="mobile-nav-list list-unstyled m-0 p-0">
            <li class="border-bottom">
                <a href="./" class="d-flex align-items-center px-3 py-3 font-weight-bold text-uppercase text-decoration-none <?= ($source == 'index' || empty($com)) ? 'text-primary' : 'text-dark' ?>">
                    <i class="fas fa-home mr-3 text-secondary" style="width: 20px;"></i> TRANG CHỦ
                </a>
            </li>
            <li class="border-bottom">
                <a href="gioi-thieu" class="d-flex align-items-center px-3 py-3 font-weight-bold text-uppercase text-decoration-none <?= ($com == 'gioi-thieu') ? 'text-primary' : 'text-dark' ?>">
                    <i class="fas fa-info-circle mr-3 text-secondary" style="width: 20px;"></i> GIỚI THIỆU
                </a>
            </li>
            <li class="border-bottom">
                <a href="du-an" class="d-flex align-items-center px-3 py-3 font-weight-bold text-uppercase text-decoration-none <?= ($com == 'du-an') ? 'text-primary' : 'text-dark' ?>">
                    <i class="fas fa-project-diagram mr-3 text-secondary" style="width: 20px;"></i> DỰ ÁN
                </a>
            </li>
            <li class="border-bottom">
                <a href="lien-he" class="d-flex align-items-center px-3 py-3 font-weight-bold text-uppercase text-decoration-none <?= ($com == 'lien-he') ? 'text-primary' : 'text-dark' ?>">
                    <i class="fas fa-phone-alt mr-3 text-secondary" style="width: 20px;"></i> LIÊN HỆ
                </a>
            </li>
        </ul>

        <!-- BUTTON XEM HỒ SƠ NĂNG LỰC TRONG DRAWER -->
        <div class="p-3">
            <a href="gioi-thieu" class="btn btn-danger w-100 font-weight-bold text-uppercase py-2" style="background-color: #e53935; border: none; border-radius: 6px; font-size: 13px; letter-spacing: 0.5px;">
                XEM HỒ SƠ NĂNG LỰC <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- CONTACT INFO IN DRAWER -->
        <div class="p-3 mt-1 bg-light border-top" style="font-size: 13px;">
            <div class="mb-2 d-flex align-items-center">
                <i class="fas fa-phone-volume mr-2 text-primary" style="width: 18px;"></i>
                <a href="tel:<?= preg_replace('/[^0-9]/', '', $hotline_display) ?>" class="text-dark font-weight-bold text-decoration-none"><?= $hotline_display ?></a>
            </div>
            <div class="mb-2 d-flex align-items-center">
                <i class="fas fa-envelope mr-2 text-primary" style="width: 18px;"></i>
                <a href="mailto:<?= $email_display ?>" class="text-dark text-decoration-none"><?= $email_display ?></a>
            </div>
            <div class="d-flex align-items-start">
                <i class="fas fa-map-marker-alt mr-2 text-primary mt-1" style="width: 18px;"></i>
                <span class="text-muted" style="line-height: 1.4;"><?= $diachi_display ?></span>
            </div>
        </div>
    </div>
</div>

<style>
.header-cachtop .fixwidth {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    width: 100% !important;
    padding-left: 15px !important;
    padding-right: 15px !important;
}
.header_left {
    flex: 1 1 auto !important;
    min-width: 0 !important;
    width: auto !important;
}
.header-brand-logo {
    height: 56px;
    width: auto;
    object-fit: contain;
    flex-shrink: 0;
}
.header-brand-title {
    font-size: 18px;
    line-height: 1.25;
}

@media (max-width: 1199px) {
    .header-brand-logo {
        height: 48px;
    }
    .header-brand-title {
        font-size: 15px;
    }
    .header_right {
        display: none !important;
    }
    .header-height {
        display: block !important;
        height: auto !important;
    }
    #menu_top {
        display: block !important;
        height: auto !important;
        min-height: 44px !important;
    }
    .desktop-menu-wrapper,
    .desktop-menu-button {
        display: none !important;
    }
    .mobile-nav-bar {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
        flex-wrap: nowrap !important;
        padding: 6px 12px !important;
    }
}
@media (max-width: 991px) {
    .header-brand-logo {
        height: 42px;
    }
    .header-brand-title {
        font-size: 14px;
    }
    .header-cachtop {
        padding-top: 6px !important;
        padding-bottom: 6px !important;
    }
}
@media (max-width: 767px) {
    .header-brand-logo {
        height: 38px;
    }
    .header-brand-title {
        font-size: 12.5px;
        letter-spacing: 0 !important;
    }
}
@media (max-width: 440px) {
    .header-cachtop .fixwidth {
        padding-left: 8px !important;
        padding-right: 8px !important;
    }
    .header-brand-logo {
        height: 30px !important;
        margin-right: 6px !important;
    }
    .header-brand-title {
        font-size: 11px !important;
        line-height: 1.2 !important;
    }
    .mobile-nav-bar {
        padding: 4px 8px !important;
    }
    .mobile-nav-bar .btn {
        font-size: 11px !important;
        padding: 4px 8px !important;
    }
    .btn-hamburger span {
        font-size: 12px !important;
    }
    .btn-hamburger i {
        font-size: 17px !important;
    }
}
@media (max-width: 360px) {
    .header-brand-logo {
        height: 26px !important;
    }
    .header-brand-title {
        font-size: 9.5px !important;
    }
}
@media (min-width: 1200px) {
    .navbar-full-wrapper {
        height: 52px !important;
    }
    .desktop-menu-wrapper {
        display: flex !important;
        height: 52px !important;
        align-items: stretch !important;
        padding-left: max(15px, calc((100vw - 1200px) / 2)) !important;
    }
    .desktop-menu-wrapper ul.menu_cap_cha {
        display: flex !important;
        height: 52px !important;
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
    }
    .desktop-menu-wrapper ul.menu_cap_cha li.menulicha {
        display: flex !important;
        height: 52px !important;
        align-items: stretch !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .desktop-menu-wrapper ul.menu_cap_cha li.menulicha > a {
        display: flex !important;
        align-items: center !important;
        height: 52px !important;
        line-height: 52px !important;
        padding: 0 22px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        color: #ffffff !important;
        text-transform: uppercase !important;
        letter-spacing: 0.8px !important;
        text-decoration: none !important;
        transition: background 0.2s ease !important;
    }
    .desktop-menu-wrapper ul.menu_cap_cha li.menulicha > a:hover,
    .desktop-menu-wrapper ul.menu_cap_cha li.menulicha.active > a {
        background-color: #073859 !important;
        color: #ffffff !important;
    }
    .desktop-menu-button {
        display: flex !important;
        height: 52px !important;
        align-items: stretch !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .desktop-menu-button .btn-hsnl-full {
        display: flex !important;
        align-items: center !important;
        height: 52px !important;
        line-height: 52px !important;
        background-color: #e53935 !important;
        color: #ffffff !important;
        padding: 0 35px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        letter-spacing: 0.8px !important;
        white-space: nowrap !important;
        border: none !important;
        border-radius: 0 !important;
        text-decoration: none !important;
        transition: background-color 0.2s ease !important;
    }
    .desktop-menu-button .btn-hsnl-full:hover {
        background-color: #c62828 !important;
        color: #ffffff !important;
    }
    .mobile-nav-bar {
        display: none !important;
    }
}
.btn-hamburger {
    background: transparent;
    border: none;
    color: #ffffff;
    cursor: pointer;
    outline: none;
    padding: 4px 0;
    transition: opacity 0.2s ease;
    flex-shrink: 0;
    white-space: nowrap;
    display: flex;
    align-items: center;
}
.btn-hamburger:hover {
    opacity: 0.85;
}
.mobile-drawer-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.55);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}
.mobile-drawer-overlay.active {
    opacity: 1;
    visibility: visible;
}
.mobile-drawer {
    position: fixed;
    top: 0;
    left: 0;
    width: 300px;
    max-width: 85vw;
    height: 100vh;
    background: #ffffff;
    z-index: 9999;
    box-shadow: 3px 0 20px rgba(0, 0, 0, 0.25);
    transform: translateX(-100%);
    transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}
.mobile-drawer.active {
    transform: translateX(0);
}
.mobile-nav-list li a {
    transition: background 0.2s ease, color 0.2s ease;
    font-size: 14px;
    letter-spacing: 0.5px;
    color: #333333;
}
.mobile-nav-list li a:hover,
.mobile-nav-list li a.active,
.mobile-nav-list li a.text-primary {
    background-color: #f2f6fa;
    color: #0e5380 !important;
}
</style>

<script type="text/javascript">
(function() {
    function initMobileMenu() {
        var btn = document.getElementById('hamburger_btn');
        var drawer = document.getElementById('mobile_drawer');
        var overlay = document.getElementById('mobile_drawer_overlay');
        var closeBtn = document.getElementById('mobile_drawer_close');

        function openDrawer(e) {
            if (e) e.preventDefault();
            if (drawer && overlay) {
                drawer.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeDrawer(e) {
            if (e) e.preventDefault();
            if (drawer && overlay) {
                drawer.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        if (btn) btn.onclick = openDrawer;
        if (closeBtn) closeBtn.onclick = closeDrawer;
        if (overlay) overlay.onclick = closeDrawer;
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileMenu);
    } else {
        initMobileMenu();
    }
})();
</script>