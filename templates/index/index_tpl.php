<?php 
    $banner_img = (!empty($banner['photo']) && file_exists(UPLOAD_PHOTO_L . $banner['photo']))
        ? UPLOAD_PHOTO_L . $banner['photo']
        : (file_exists('upload/photo/banner_real.jpg') ? 'upload/photo/banner_real.jpg' : 'assets/images/hero_banner.svg');
    $cta_img = (!empty($bg_tuvan['photo']) && file_exists(UPLOAD_PHOTO_L . $bg_tuvan['photo']))
        ? UPLOAD_PHOTO_L . $bg_tuvan['photo']
        : (file_exists('upload/photo/cta_real.jpg') ? 'upload/photo/cta_real.jpg' : 'assets/images/cta_banner.svg');
    $placeholder_img = 'assets/images/placeholder_project.jpg';
    $company_name = !empty($setting['ten' . $lang]) ? $setting['ten' . $lang] : 'CƠ ĐIỆN LẠNH ĐỨC NHÂN';
    $slogan_display = !empty($optsetting['slogan']) ? $optsetting['slogan'] : 'Tối ưu chi phí – Chuẩn chất lượng – An toàn – Cam kết tiến độ';
    $hero_desc = !empty($gioithieu['mota' . $lang]) ? $gioithieu['mota' . $lang] : 'Chuyên cung cấp, thi công, lắp đặt, bảo trì, hệ thống cơ điện cho các công trình.';
?>
<style>
/* Project Carousel */
.duan-carousel {
    position: relative;
    width: 100%;
}

.duan-viewport {
    overflow: hidden;
    width: 100%;
    position: relative;
    cursor: grab;
    user-select: none;
    -webkit-user-select: none;
    touch-action: pan-y;
}
.duan-viewport:active,
.duan-viewport.is-dragging {
    cursor: grabbing;
}

.duan-item,
.duan-item * {
    -webkit-user-drag: none;
    user-drag: none;
}

.duan-track {
    display: flex;
    transition: transform 0.36s cubic-bezier(0.22, 1, 0.36, 1);
    will-change: transform;
    margin: 0;
    padding: 4px 0 10px 0;
}

/* 4 items per page on desktop */
.duan-item {
    flex: 0 0 calc((100% - 3 * 15px) / 4);
    max-width: calc((100% - 3 * 15px) / 4);
    min-width: calc((100% - 3 * 15px) / 4);
    margin-right: 15px;
    box-sizing: border-box;
}
.duan-item:last-child {
    margin-right: 0;
}

/* Responsive columns & Media Queries */
.duan-item .card {
    border-radius: 12px !important;
    border: 1px solid #dcdcdc !important;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex !important;
    flex-direction: column !important;
    height: 100% !important;
    background-color: #ffffff !important;
    overflow: hidden !important;
}
.duan-item .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
}
.duan-item .duan-img-wrap {
    position: relative;
    display: block;
    width: 100%;
    height: 185px;
    overflow: hidden;
    background-color: #f1f5f9;
    border-top-left-radius: 11px;
    border-top-right-radius: 11px;
}
.duan-item .card-img-top {
    width: 100% !important;
    height: 100% !important;
    min-height: 100% !important;
    max-height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    display: block !important;
    transition: transform 0.4s ease;
}
.duan-item .card:hover .card-img-top {
    transform: scale(1.08);
}
.duan-zoom-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(14, 83, 128, 0.85);
    color: #ffffff !important;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.25s ease;
    z-index: 5;
    text-decoration: none !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    cursor: pointer;
}
.duan-item .card:hover .duan-zoom-btn {
    opacity: 1;
    transform: scale(1);
}
.duan-zoom-btn:hover {
    background: #e53935 !important;
    transform: scale(1.15) !important;
    color: #ffffff !important;
}
.duan-item .card-body {
    flex: 1 1 auto;
    display: flex !important;
    align-items: center !important;
    padding: 12px 14px !important;
    min-height: 66px !important;
    height: 66px !important;
    max-height: 66px !important;
    background-color: #ffffff;
    border-top: 1px solid #f0f0f0;
    box-sizing: border-box;
}
.duan-item .card-title {
    font-size: 14px !important;
    line-height: 1.35 !important;
    font-weight: 700 !important;
    margin: 0 !important;
    width: 100%;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.duan-item .card-title a {
    color: #0e5380 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition: color 0.2s ease;
}
.duan-item .card-title a:hover {
    color: #e53935 !important;
}

@media (max-width: 1199px) and (min-width: 992px) {
    .duan-item {
        flex: 0 0 calc((100% - 3 * 14px) / 4);
        max-width: calc((100% - 3 * 14px) / 4);
        min-width: calc((100% - 3 * 14px) / 4);
        margin-right: 14px;
    }
    .duan-item .duan-img-wrap,
    .duan-item .card-img-top {
        height: 165px !important;
        min-height: 165px !important;
        max-height: 165px !important;
    }
    .duan-item .card-body {
        height: 64px !important;
        min-height: 64px !important;
    }
}

@media (max-width: 991px) and (min-width: 768px) {
    .duan-item {
        flex: 0 0 calc((100% - 2 * 14px) / 3);
        max-width: calc((100% - 2 * 14px) / 3);
        min-width: calc((100% - 2 * 14px) / 3);
        margin-right: 14px;
    }
    .duan-item .duan-img-wrap,
    .duan-item .card-img-top {
        height: 160px !important;
        min-height: 160px !important;
        max-height: 160px !important;
    }
    .duan-nav-prev { left: -14px; }
    .duan-nav-next { right: -14px; }
}

@media (max-width: 767px) and (min-width: 576px) {
    .duan-item {
        flex: 0 0 calc((100% - 12px) / 2);
        max-width: calc((100% - 12px) / 2);
        min-width: calc((100% - 12px) / 2);
        margin-right: 12px;
    }
    .duan-item .duan-img-wrap,
    .duan-item .card-img-top {
        height: 155px !important;
        min-height: 155px !important;
        max-height: 155px !important;
    }
    .duan-nav-btn {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
    .duan-nav-prev { left: -10px; }
    .duan-nav-next { right: -10px; }
}

@media (max-width: 575px) {
    .category-block {
        padding: 18px 12px !important;
        border-radius: 10px !important;
    }
    .duan-item {
        flex: 0 0 calc(100% - 10px);
        max-width: calc(100% - 10px);
        min-width: calc(100% - 10px);
        margin-right: 10px;
    }
    .duan-item .duan-img-wrap,
    .duan-item .card-img-top {
        height: 190px !important;
        min-height: 190px !important;
        max-height: 190px !important;
    }
    .duan-nav-btn {
        display: none !important;
    }
    .duan-pagination {
        margin-top: 16px;
    }
}

/* NAVIGATION ARROWS */
.duan-nav-btn {
    position: absolute;
    top: 50%;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background-color: #0e5380;
    color: #ffffff;
    border: 2px solid #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.25s ease;
    outline: none;
    transform: translateY(-50%);
}
.duan-nav-prev {
    left: -19px;
}
.duan-nav-next {
    right: -19px;
}
.duan-nav-btn:hover {
    background-color: #e53935;
    color: #ffffff;
    transform: translateY(-50%) scale(1.1);
}
.duan-nav-btn.disabled,
.duan-nav-btn:disabled {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

/* Pagination */
.duan-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 22px;
    width: 100%;
}
.duan-dots-container {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 6px 14px;
    background: rgba(14, 83, 128, 0.06);
    border-radius: 20px;
}

/* Inactive Small Dots */
.duan-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #cbd5e1;
    cursor: pointer;
    transition: background-color 0.25s ease, transform 0.2s ease;
    flex-shrink: 0;
    display: block;
}
.duan-dot:hover {
    background-color: #94a3b8;
    transform: scale(1.2);
}

/* Active Dot */
.duan-dot-active {
    position: absolute;
    top: 50%;
    left: 14px;
    height: 10px;
    width: 10px;
    border-radius: 5px;
    background: linear-gradient(135deg, #0e5380 0%, #1a6d9e 100%);
    box-shadow: 0 2px 6px rgba(14, 83, 128, 0.4);
    pointer-events: none;
    z-index: 2;
    transform: translateY(-50%);
    transition: left 0.38s cubic-bezier(0.34, 1.56, 0.64, 1),
                width 0.22s cubic-bezier(0.4, 0, 0.2, 1),
                border-radius 0.22s ease,
                transform 0.38s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Fluid Stretch when moving */
.duan-dot-active.is-stretching {
    width: 22px;
    border-radius: 5px;
}

/* When pagination is hidden (<= 4 items) */
.duan-carousel.no-pagination .duan-pagination,
.duan-carousel.no-pagination .duan-nav-btn {
    display: none !important;
}

/* Partner Card */
.partner-card-box {
    background-color: #ebf0f5 !important;
    border-radius: 8px !important;
    height: 90px;
    padding: 10px 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none !important;
    box-shadow: none !important;
    transition: transform 0.2s ease;
}
.partner-card-box:hover {
    transform: translateY(-2px);
}
.partner-card-box img {
    max-height: 70px;
    width: 100%;
    object-fit: contain;
    display: block;
}

/* HERO BANNER RESPONSIVE OVERLAY */
.hero-section {
    position: relative;
    background-size: cover !important;
    background-position: center right !important;
}
.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.4) 100%);
    pointer-events: none;
    z-index: 1;
}
.hero-section .fixwidth {
    position: relative;
    z-index: 2;
}

@media (max-width: 991px) {
    .hero-section {
        min-height: 400px !important;
        padding-top: 45px !important;
        padding-bottom: 70px !important;
    }
    .hero-section h1 {
        font-size: 32px !important;
    }
    .hero-section h2 {
        font-size: 19px !important;
    }
    .hero-section p {
        font-size: 14px !important;
    }
}

@media (max-width: 575px) {
    .hero-section {
        min-height: 340px !important;
        padding-top: 30px !important;
        padding-bottom: 50px !important;
    }
    .hero-section h1 {
        font-size: 22px !important;
        line-height: 1.25 !important;
    }
    .hero-section h2 {
        font-size: 15px !important;
        line-height: 1.35 !important;
    }
    .hero-section p {
        font-size: 13px !important;
        line-height: 1.5 !important;
    }
}

/* STAT BADGE RESPONSIVE */
@media (max-width: 767px) {
    .stat-badge-wrapper {
        margin-top: 15px !important;
    }
    .stat-badge-wrapper .row > div {
        border-right: none !important;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 12px;
        margin-bottom: 12px;
    }
    .stat-badge-wrapper .row > div:last-child {
        border-bottom: none !important;
        padding-bottom: 0;
        margin-bottom: 0;
    }
}
</style>

<!-- HERO BANNER SECTION -->
<section class="hero-section position-relative" style="background: url('<?= $banner_img ?>') no-repeat center center / cover; min-height: 500px; padding-top: 75px; padding-bottom: 95px;">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="font-weight-bold mb-3" style="color: #0e5380; font-size: 46px; letter-spacing: 0.5px; font-family: 'Segoe UI', Roboto, sans-serif;">
                    <?= $company_name ?>
                </h1>
                <h2 class="font-weight-bold mb-3" style="color: #0e5380; font-size: 23px; line-height: 1.3;">
                    <?= $slogan_display ?>
                </h2>
                <p class="mb-4" style="color: #333333; font-size: 16px; font-weight: 500; line-height: 1.6; max-width: 580px;">
                    <?= $hero_desc ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- STAT BADGE CONTAINER -->
<div class="fixwidth stat-badge-wrapper" style="margin-top: -65px; position: relative; z-index: 10;">
    <div class="bg-white rounded shadow-sm p-4 border">
        <div class="row text-center align-items-center">
            <div class="col-md-4 border-right border-md-0 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-cog fa-2x mr-3" style="color: #0e5380;"></i>
                    <div class="text-left">
                        <span class="font-weight-bold h3 m-0 d-block" style="color: #0e5380;">19+</span>
                        <span class="text-muted small font-weight-bold">Năm kinh nghiệm</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 border-right border-md-0 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-city fa-2x mr-3" style="color: #0e5380;"></i>
                    <div class="text-left">
                        <span class="font-weight-bold h3 m-0 d-block" style="color: #0e5380;">88+</span>
                        <span class="text-muted small font-weight-bold">Dự án đã triển khai</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-users fa-2x mr-3" style="color: #0e5380;"></i>
                    <div class="text-left">
                        <span class="font-weight-bold h3 m-0 d-block" style="color: #0e5380;">97+</span>
                        <span class="text-muted small font-weight-bold">Kỹ sư & kỹ thuật viên</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION DỰ ÁN TIÊU BIỂU -->
<section class="section_duan py-5 bg-white">
    <div class="fixwidth">
        <!-- TITLE WITH RED VERTICAL BAR -->
        <div class="d-flex align-items-center mb-4">
            <span class="mr-2 font-weight-bold h3" style="color: #e53935; font-size: 26px;">|</span>
            <h2 class="font-weight-bold text-uppercase m-0" style="color: #0e5380; font-size: 22px;">DỰ ÁN TIÊU BIỂU</h2>
        </div>

        <?php
        $groupedProjects = [];
        if (!empty($duan) && is_array($duan)) {
            foreach ($duan as $v) {
                $catName = !empty($v['mota' . $lang]) ? trim($v['mota' . $lang]) : 'CÔNG NGHIỆP';
                $groupedProjects[$catName][] = $v;
            }
        }

        foreach ($groupedProjects as $catName => $catGroup) {
            $cat_count = count($catGroup);
            $has_more_than_4 = ($cat_count > 4);
            $total_pages = ceil($cat_count / 4);
        ?>
        <!-- CATEGORY CONTAINER WITH LIGHT BLUE BACKGROUND (#f2f6fa) -->
        <div class="category-block mb-5 p-4 rounded-lg" style="background-color: #f2f6fa; border-radius: 12px;">
            <div class="mb-4">
                <span class="badge px-4 py-2 text-white font-weight-bold text-uppercase" style="background-color: #0e5380; font-size: 14px; border-radius: 4px;">
                    <?= htmlspecialchars($catName) ?>
                </span>
            </div>

            <div class="duan-carousel <?= $has_more_than_4 ? 'has-pagination' : 'no-pagination' ?>" data-total="<?= $cat_count ?>">
                <?php if ($has_more_than_4) { ?>
                <button type="button" class="duan-nav-btn duan-nav-prev" aria-label="Trang trước"><i class="fas fa-chevron-left"></i></button>
                <?php } ?>

                <div class="duan-viewport">
                    <div class="duan-track">
                        <?php foreach ($catGroup as $v) { 
                            $photo_file = $v['photo'] ?? '';
                            $photo_url = (!empty($photo_file) && file_exists(UPLOAD_NEWS_L . $photo_file)) ? UPLOAD_NEWS_L . $photo_file : $placeholder_img;
                            $ten_display = $v['ten' . $lang] ?? ($v['tenvi'] ?? '');
                            $link_display = $v['tenkhongdauvi'] ?? '#';
                        ?>
                        <div class="duan-item">
                            <div class="card h-100 bg-white shadow-sm overflow-hidden" style="border-radius: 12px; border: 1px solid #dcdcdc !important;">
                                <div class="duan-img-wrap position-relative">
                                    <a href="<?= $link_display ?>" class="d-block w-100 h-100 overflow-hidden" title="<?= htmlspecialchars($ten_display) ?>">
                                        <img onerror="this.src='<?= $placeholder_img ?>';"
                                             src="<?= $photo_url ?>"
                                             class="card-img-top w-100" alt="<?= htmlspecialchars($ten_display) ?>">
                                    </a>
                                    <a data-fancybox="gallery-duan" data-caption="<?= htmlspecialchars($ten_display) ?>" href="<?= $photo_url ?>" class="duan-zoom-btn" title="Phóng to ảnh">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="card-body p-3 bg-white text-left">
                                    <h3 class="card-title font-weight-bold m-0">
                                        <a href="<?= $link_display ?>"><?= htmlspecialchars($ten_display) ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if ($has_more_than_4) { ?>
                <button type="button" class="duan-nav-btn duan-nav-next" aria-label="Trang tiếp theo"><i class="fas fa-chevron-right"></i></button>

                <div class="duan-pagination">
                    <div class="duan-dots-container">
                        <?php for ($p = 0; $p < $total_pages; $p++) { ?>
                        <span class="duan-dot" data-page="<?= $p ?>" title="Trang <?= $p + 1 ?>"></span>
                        <?php } ?>
                        <span class="duan-dot-active"></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<!-- ĐỐI TÁC -->
<section class="section_doitac pt-4 pb-2 bg-white">
    <div class="fixwidth text-center">
        <h2 class="font-weight-bold text-uppercase m-0 d-inline-block" style="color: #0e5380; font-size: 26px; font-weight: 800; letter-spacing: 0.5px; position: relative; padding-bottom: 8px;">
            ĐỐI TÁC
            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 44px; height: 3px; background-color: #e53935; border-radius: 2px;"></span>
        </h2>
        
        <div class="row justify-content-center align-items-center mt-4">
            <?php if (!empty($doitac) && count($doitac) > 0) { 
                foreach ($doitac as $k => $v) { 
                    $p_img = (!empty($v['photo']) && file_exists(UPLOAD_PHOTO_L . $v['photo'])) ? UPLOAD_PHOTO_L . $v['photo'] : 'assets/images/noimage.png';
                    $p_link = !empty($v['link']) ? $v['link'] : 'javascript:void(0)';
                    $p_target = !empty($v['link']) ? 'target="_blank"' : '';
            ?>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <a href="<?= $p_link ?>" <?= $p_target ?> class="partner-card-box d-flex align-items-center justify-content-center text-decoration-none">
                    <img onerror="this.src='assets/images/noimage.png';" src="<?= $p_img ?>" alt="<?= htmlspecialchars($v['ten' . $lang] ?? 'Đối tác') ?>">
                </a>
            </div>
            <?php } } else { ?>
            <?php for ($i = 1; $i <= 8; $i++) { ?>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="partner-card-box">
                    <img src="assets/images/doitac/partner_<?= $i ?>.png" alt="Đối tác <?= $i ?>">
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<div class="fixwidth my-4">
    <div style="border-top: 2px solid #e53935; width: 100%; opacity: 0.85;"></div>
</div>

<!-- CTA BANNER -->
<section class="section_cta py-5 text-white" style="background: url('<?= $cta_img ?>') no-repeat center center / cover; min-height: 290px;">
    <div class="fixwidth py-3">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="font-weight-bold text-uppercase mb-2 text-white" style="font-size: 28px; font-weight: 800; letter-spacing: 0.5px; line-height: 1.3;">
                    BẠN ĐANG TÌM NHÀ THẦU CƠ ĐIỆN CHO DỰ ÁN?
                </h2>
                <p class="mb-4 lead text-white" style="font-size: 16px; opacity: 0.95;">
                    Hãy để chúng tôi đồng hành cùng bạn với chi phí hợp lý và chất lượng tốt nhất
                </p>
                <div class="d-flex align-items-center flex-wrap">
                    <a href="lien-he" class="btn font-weight-bold text-white text-uppercase px-4 py-3 mr-3 mb-2 mb-sm-0 text-decoration-none" style="background-color: #e53935; border: none; border-radius: 6px; font-size: 14px; letter-spacing: 0.5px;">
                        YÊU CẦU BÁO GIÁ <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="gioi-thieu" class="btn font-weight-bold text-white text-uppercase px-4 py-3 mb-2 mb-sm-0 text-decoration-none" style="border: 2px solid #ffffff; background: transparent; border-radius: 6px; font-size: 14px; letter-spacing: 0.5px;">
                        XEM HỒ SƠ NĂNG LỰC <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Carousel Script -->
<script type="text/javascript">
(function() {
    class DuanSlider {
        constructor(wrapper) {
            this.wrapper = wrapper;
            this.viewport = wrapper.querySelector('.duan-viewport');
            this.track = wrapper.querySelector('.duan-track');
            this.items = Array.from(wrapper.querySelectorAll('.duan-item'));
            this.prevBtn = wrapper.querySelector('.duan-nav-prev');
            this.nextBtn = wrapper.querySelector('.duan-nav-next');
            this.paginationWrapper = wrapper.querySelector('.duan-pagination');
            this.dotsContainer = wrapper.querySelector('.duan-dots-container');
            this.activeDot = wrapper.querySelector('.duan-dot-active');

            this.totalItems = this.items.length;
            this.currentPage = 0;
            this.totalPages = 1;
            this.itemsPerPage = 4;
            this.currentOffset = 0;

            // Autoplay states
            this.autoplayTimer = null;
            this.autoplayDelay = 3500; // 3.5 seconds per slide
            this.isHovered = false;

            // Drag / Swipe states
            this.isDragging = false;
            this.startX = 0;
            this.currentX = 0;
            this.startTranslate = 0;
            this.dragPreventClick = false;
            this.stretchTimer = null;

            this.init();
        }

        getItemsPerPage() {
            const w = window.innerWidth;
            if (w < 576) return 1;
            if (w < 768) return 2;
            if (w < 992) return 3;
            return 4;
        }

        init() {
            if (!this.viewport || !this.track || this.totalItems === 0) return;
            this.updateDimensions();
            this.bindEvents();
            this.bindTouchAndDrag();

            // Initial positioning of active dot
            setTimeout(() => {
                this.updateDimensions();
                this.syncActiveDot(false);
                this.startAutoplay();
            }, 100);

            window.addEventListener('load', () => {
                this.updateDimensions();
                this.syncActiveDot(false);
                this.startAutoplay();
            });
        }

        startAutoplay() {
            this.stopAutoplay();
            if (this.totalPages <= 1 || this.isDragging || this.isHovered) return;
            this.autoplayTimer = setInterval(() => {
                if (this.totalPages <= 1 || this.isDragging || this.isHovered) return;
                let nextPage = this.currentPage + 1;
                if (nextPage >= this.totalPages) {
                    nextPage = 0; // loop back to page 0
                }
                this.goToPage(nextPage, true);
            }, this.autoplayDelay);
        }

        stopAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        }

        resetAutoplay() {
            this.stopAutoplay();
            this.startAutoplay();
        }

        updateDimensions() {
            this.itemsPerPage = this.getItemsPerPage();
            this.totalPages = Math.ceil(this.totalItems / this.itemsPerPage);

            // Hide pagination completely if totalItems <= 4 or totalPages <= 1
            if (this.totalItems <= 4 || this.totalPages <= 1) {
                this.wrapper.classList.add('no-pagination');
                if (this.paginationWrapper) this.paginationWrapper.style.display = 'none';
                if (this.prevBtn) this.prevBtn.style.display = 'none';
                if (this.nextBtn) this.nextBtn.style.display = 'none';
                this.stopAutoplay();
            } else {
                this.wrapper.classList.remove('no-pagination');
                if (this.paginationWrapper) this.paginationWrapper.style.display = 'flex';
                if (this.prevBtn) this.prevBtn.style.display = 'flex';
                if (this.nextBtn) this.nextBtn.style.display = 'flex';
                this.renderDots();
                this.startAutoplay();
            }

            if (this.currentPage >= this.totalPages) {
                this.currentPage = Math.max(0, this.totalPages - 1);
            }
            this.goToPage(this.currentPage, false);
        }

        renderDots() {
            if (!this.dotsContainer) return;
            const currentDotCount = this.dotsContainer.querySelectorAll('.duan-dot').length;
            if (currentDotCount !== this.totalPages) {
                this.dotsContainer.innerHTML = '';
                for (let i = 0; i < this.totalPages; i++) {
                    const dot = document.createElement('span');
                    dot.className = 'duan-dot';
                    dot.setAttribute('data-page', i);
                    dot.setAttribute('title', `Trang ${i + 1}`);
                    this.dotsContainer.appendChild(dot);
                }
                const activeDot = document.createElement('span');
                activeDot.className = 'duan-dot-active';
                this.dotsContainer.appendChild(activeDot);
                this.activeDot = activeDot;
            } else {
                if (!this.activeDot) {
                    this.activeDot = this.dotsContainer.querySelector('.duan-dot-active');
                }
            }
        }

        getMaxOffset() {
            return Math.max(0, this.track.scrollWidth - this.viewport.clientWidth);
        }

        getPageOffset(page) {
            if (page <= 0) return 0;
            const maxOffset = this.getMaxOffset();
            if (page >= this.totalPages - 1) return maxOffset;
            const targetIndex = page * this.itemsPerPage;
            if (this.items[targetIndex]) {
                return Math.min(this.items[targetIndex].offsetLeft, maxOffset);
            }
            return 0;
        }

        goToPage(page, animate = true) {
            this.currentPage = Math.max(0, Math.min(page, this.totalPages - 1));
            this.currentOffset = this.getPageOffset(this.currentPage);

            if (animate) {
                this.track.style.transition = 'transform 0.36s cubic-bezier(0.22, 1, 0.36, 1)';
            } else {
                this.track.style.transition = 'none';
            }
            this.track.style.transform = `translate3d(-${this.currentOffset}px, 0, 0)`;

            this.updateNavButtons();
            this.syncActiveDot(animate);
        }

        updateNavButtons() {
            if (this.prevBtn) {
                if (this.currentPage <= 0) {
                    this.prevBtn.classList.add('disabled');
                    this.prevBtn.disabled = true;
                } else {
                    this.prevBtn.classList.remove('disabled');
                    this.prevBtn.disabled = false;
                }
            }
            if (this.nextBtn) {
                if (this.currentPage >= this.totalPages - 1) {
                    this.nextBtn.classList.add('disabled');
                    this.nextBtn.disabled = true;
                } else {
                    this.nextBtn.classList.remove('disabled');
                    this.nextBtn.disabled = false;
                }
            }
        }

        syncActiveDot(animate = true) {
            if (!this.dotsContainer || !this.activeDot) return;
            const targetDot = this.dotsContainer.querySelector(`.duan-dot[data-page="${this.currentPage}"]`);
            if (!targetDot) return;

            const cRect = this.dotsContainer.getBoundingClientRect();
            const dRect = targetDot.getBoundingClientRect();
            const targetLeft = dRect.left - cRect.left;

            if (animate) {
                this.activeDot.style.transition = 'left 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), width 0.22s ease';
                this.activeDot.classList.add('is-stretching');
                this.activeDot.style.left = targetLeft + 'px';

                clearTimeout(this.stretchTimer);
                this.stretchTimer = setTimeout(() => {
                    this.activeDot.classList.remove('is-stretching');
                    this.activeDot.style.width = '10px';
                }, 240);
            } else {
                this.activeDot.style.transition = 'none';
                this.activeDot.style.left = targetLeft + 'px';
                this.activeDot.style.width = '10px';
                this.activeDot.offsetHeight; // force reflow
            }
        }

        syncDotOnDrag(diff) {
            if (!this.dotsContainer || !this.activeDot || this.totalPages <= 1) return;
            const dots = this.dotsContainer.querySelectorAll('.duan-dot');
            if (!dots.length) return;

            const cRect = this.dotsContainer.getBoundingClientRect();
            const curDot = dots[this.currentPage];
            if (!curDot) return;

            const curLeft = curDot.getBoundingClientRect().left - cRect.left;
            const vpWidth = this.viewport.clientWidth || 1;
            const progress = -diff / vpWidth; // negative when dragging left

            let targetIndex = this.currentPage + (progress > 0 ? 1 : -1);
            targetIndex = Math.max(0, Math.min(targetIndex, this.totalPages - 1));
            const targetDot = dots[targetIndex];

            if (targetDot) {
                const targetLeft = targetDot.getBoundingClientRect().left - cRect.left;
                const dist = targetLeft - curLeft;
                const ratio = Math.min(1, Math.max(0, Math.abs(progress)));
                const currentPos = curLeft + dist * ratio;
                const stretchWidth = 10 + Math.abs(ratio) * 14;

                this.activeDot.style.transition = 'none';
                this.activeDot.style.left = currentPos + 'px';
                this.activeDot.style.width = stretchWidth + 'px';
            }
        }

        bindEvents() {
            if (this.prevBtn) {
                this.prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (this.currentPage > 0) this.goToPage(this.currentPage - 1, true);
                    this.resetAutoplay();
                });
            }
            if (this.nextBtn) {
                this.nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (this.currentPage < this.totalPages - 1) this.goToPage(this.currentPage + 1, true);
                    this.resetAutoplay();
                });
            }
            if (this.dotsContainer) {
                this.dotsContainer.addEventListener('click', (e) => {
                    const dot = e.target.closest('.duan-dot');
                    if (dot) {
                        const page = parseInt(dot.getAttribute('data-page'), 10);
                        if (!isNaN(page)) {
                            this.goToPage(page, true);
                            this.resetAutoplay();
                        }
                    }
                });
            }

            // Pause autoplay on mouse hover
            this.wrapper.addEventListener('mouseenter', () => {
                this.isHovered = true;
                this.stopAutoplay();
            });
            this.wrapper.addEventListener('mouseleave', () => {
                this.isHovered = false;
                this.startAutoplay();
            });

            // Pause on tab visibility change
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.stopAutoplay();
                } else {
                    this.startAutoplay();
                }
            });

            let resizeTimer = null;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    this.updateDimensions();
                }, 80);
            });
        }

        bindTouchAndDrag() {
            const vp = this.viewport;
            let rafId = null;
            let lastX = 0;
            let lastTime = 0;
            let velocityX = 0;

            // Prevent native ghost image drag
            vp.addEventListener('dragstart', (e) => e.preventDefault());

            const onPointerDown = (e) => {
                if (e.button !== 0 && e.pointerType === 'mouse') return;
                if (this.totalPages <= 1) return;

                this.isDragging = true;
                this.dragPreventClick = false;
                this.startX = e.clientX;
                this.currentX = e.clientX;
                lastX = e.clientX;
                lastTime = performance.now();
                velocityX = 0;
                this.startTranslate = -this.currentOffset;

                this.stopAutoplay();
                this.track.style.transition = 'none';
                if (this.activeDot) this.activeDot.style.transition = 'none';
                vp.classList.add('is-dragging');

                try {
                    vp.setPointerCapture(e.pointerId);
                } catch(err) {}
            };

            const onPointerMove = (e) => {
                if (!this.isDragging) return;
                this.currentX = e.clientX;
                const now = performance.now();
                const dt = now - lastTime;
                if (dt > 12) {
                    velocityX = (this.currentX - lastX) / dt;
                    lastX = this.currentX;
                    lastTime = now;
                }

                const diff = this.currentX - this.startX;
                if (Math.abs(diff) > 4) {
                    this.dragPreventClick = true;
                }

                if (rafId) cancelAnimationFrame(rafId);
                rafId = requestAnimationFrame(() => {
                    if (!this.isDragging) return;
                    const maxTranslate = 0;
                    const minTranslate = -this.getMaxOffset();
                    let newTranslate = this.startTranslate + diff;

                    // Smooth elastic edge resistance
                    if (newTranslate > maxTranslate) {
                        newTranslate = maxTranslate + (newTranslate - maxTranslate) * 0.28;
                    } else if (newTranslate < minTranslate) {
                        newTranslate = minTranslate + (newTranslate - minTranslate) * 0.28;
                    }
                    this.track.style.transform = `translate3d(${newTranslate}px, 0, 0)`;

                    // Real-time dot stretch and movement
                    this.syncDotOnDrag(diff);
                });
            };

            const onPointerUp = (e) => {
                if (!this.isDragging) return;
                this.isDragging = false;
                vp.classList.remove('is-dragging');
                if (rafId) cancelAnimationFrame(rafId);

                try {
                    vp.releasePointerCapture(e.pointerId);
                } catch(err) {}

                const diff = this.currentX - this.startX;
                const width = vp.clientWidth || 1;
                const flickThreshold = 0.25; // px/ms
                const distThreshold = Math.min(55, width * 0.14);

                let targetPage = this.currentPage;
                if (diff < -distThreshold || velocityX < -flickThreshold) {
                    if (this.currentPage < this.totalPages - 1) {
                        targetPage = this.currentPage + 1;
                    }
                } else if (diff > distThreshold || velocityX > flickThreshold) {
                    if (this.currentPage > 0) {
                        targetPage = this.currentPage - 1;
                    }
                }

                this.goToPage(targetPage, true);
                this.resetAutoplay();
            };

            vp.addEventListener('pointerdown', onPointerDown);
            vp.addEventListener('pointermove', onPointerMove);
            vp.addEventListener('pointerup', onPointerUp);
            vp.addEventListener('pointercancel', onPointerUp);

            // Prevent accidental card navigation during drag
            vp.addEventListener('click', (e) => {
                if (this.dragPreventClick) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }, true);
        }
    }

    function initDuanSliders() {
        document.querySelectorAll('.duan-carousel').forEach(el => {
            if (!el.__duanSlider) {
                el.__duanSlider = new DuanSlider(el);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDuanSliders);
    } else {
        initDuanSliders();
    }
    window.addEventListener('load', initDuanSliders);
})();
</script>