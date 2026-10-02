<?php
    $hotline_display = !empty($optsetting['hotline']) ? $optsetting['hotline'] : (!empty($optsetting['dienthoai']) ? $optsetting['dienthoai'] : '0976 968 048 - 0909165478');
    $email_display = !empty($optsetting['email']) ? $optsetting['email'] : 'dinh.np@ducnhan.com.vn';
    $diachi_display = !empty($optsetting['diachi']) ? $optsetting['diachi'] : '965/36/2 Quang Trung, Phường An Hội Tây, TP.HCM';
    $zalo_display = !empty($optsetting['zalo']) ? $optsetting['zalo'] : '0976 968 048';
    $fanpage_display = !empty($optsetting['fanpage']) ? $optsetting['fanpage'] : '';
    $footer_bg_style = (!empty($bg_footer['photo']) && file_exists(UPLOAD_PHOTO_L . $bg_footer['photo'])) 
        ? "background: url('" . UPLOAD_PHOTO_L . $bg_footer['photo'] . "') no-repeat center center / cover;" 
        : "";
?>
<!-- FOOTER -->
<footer class="bg-white py-5 border-top" style="<?= $footer_bg_style ?>">
    <div class="fixwidth">
        <div class="row align-items-center">
            <!-- MAP COLUMN (LEFT) -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="map-container rounded-lg overflow-hidden shadow-sm border" style="border-radius: 16px;">
                    <?php if(!empty($optsetting['toado_iframe'])) { ?>
                        <?= htmlspecialchars_decode($optsetting['toado_iframe'] ?? '') ?>
                    <?php } else { ?>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.788876402778!2d106.65434!3d10.82747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529124a91cf67%3A0x889dbecb74d6c483!2s965%2F36%2F2%20Quang%20Trung%2C%20Ph%C6%B0%C6%A1ng%2014%2C%20G%C3%B2%20V%E1%BA%A5p%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh!5e0!3m2!1svi!2s!4v1700000000000!5m2!1svi!2s" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php } ?>
                </div>
            </div>
            
            <!-- CONTACT INFO COLUMN (MIDDLE) -->
            <div class="col-lg-4 mb-4 mb-lg-0 pl-lg-4">
                <h3 class="font-weight-bold h6 text-uppercase mb-4" style="color: #0e5380; font-size: 16px;">Thông tin liên hệ</h3>
                <div class="contact-details text-dark" style="line-height: 2.2; font-size: 14px;">
                    <p class="mb-3 d-flex align-items-center">
                        <i class="fas fa-phone-alt mr-3 text-dark" style="font-size: 16px;"></i>
                        <strong style="font-size: 15px; color: #222;"><?= $hotline_display ?></strong>
                    </p>
                    <p class="mb-3 d-flex align-items-center">
                        <i class="fas fa-envelope mr-3 text-dark" style="font-size: 16px;"></i>
                        <a href="mailto:<?= $email_display ?>" class="text-dark border-bottom border-dark pb-1 text-decoration-none"><?= $email_display ?></a>
                    </p>
                    <p class="mb-0 d-flex align-items-start">
                        <i class="fas fa-map-marker-alt mr-3 mt-1 text-dark" style="font-size: 18px;"></i>
                        <span><?= $diachi_display ?></span>
                    </p>
                </div>
            </div>

            <!-- SOCIAL & WORK TIME COLUMN (RIGHT) -->
            <div class="col-lg-3">
                <h3 class="font-weight-bold h6 text-uppercase mb-4" style="color: #0e5380; font-size: 16px;">Kết nối với chúng tôi:</h3>
                <div class="mb-4 d-flex align-items-center flex-wrap" style="gap: 8px;">
                    <?php if(!empty($zalo_display)) { ?>
                    <a href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $zalo_display) ?>" target="_blank" class="btn rounded-pill px-3 py-2 d-inline-flex align-items-center text-decoration-none shadow-sm border" style="background-color: #f0f4f8;">
                        <span class="badge rounded-circle mr-2 px-2 py-1 text-white font-weight-bold" style="background-color: #0068ff; font-size: 11px;">zalo</span>
                        <strong style="color: #0e5380; font-size: 15px;"><?= $zalo_display ?></strong>
                    </a>
                    <?php } ?>
                    <?php if(!empty($fanpage_display)) { ?>
                    <a href="<?= $fanpage_display ?>" target="_blank" class="btn rounded-circle d-inline-flex align-items-center justify-content-center text-decoration-none shadow-sm border text-white" style="background-color: #1877f2; width: 38px; height: 38px;" title="Facebook Fanpage">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <?php } ?>
                    <?php if(!empty($social1)) { foreach($social1 as $s) { 
                        $s_img = (!empty($s['photo']) && file_exists(UPLOAD_PHOTO_L . $s['photo'])) ? UPLOAD_PHOTO_L . $s['photo'] : '';
                        if($s_img) {
                    ?>
                    <a href="<?= !empty($s['link']) ? $s['link'] : '#' ?>" target="_blank" class="btn rounded-circle d-inline-flex align-items-center justify-content-center text-decoration-none shadow-sm border p-0 overflow-hidden" style="width: 38px; height: 38px;" title="<?= htmlspecialchars($s['ten' . $lang] ?? '') ?>">
                        <img src="<?= $s_img ?>" alt="<?= htmlspecialchars($s['ten' . $lang] ?? '') ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </a>
                    <?php } } } ?>
                </div>
                <div class="work-time small text-muted">
                    <p class="mb-1 font-weight-bold text-dark" style="font-size: 14px;">Thời gian làm việc:</p>
                    <p class="m-0 text-secondary" style="font-size: 14px;">08h – 17h30 từ Thứ Hai đến Thứ Bảy.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- COPYRIGHT BAR -->
<div class="copyright-bar py-3 text-center border-top small bg-white text-muted">
    <div class="fixwidth" style="font-weight: 500; font-size: 13px;">
        <?= !empty($optsetting['copyright']) ? $optsetting['copyright'] : '©2015 - 2026 SOTA DUCNHAN ELECTRICAL MECHANICAL REFRIGERATION CO.,LTD . Design by SOTA' ?>
    </div>
</div>