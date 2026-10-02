<div class="fixwidth py-4">
    <div class="main-title text-uppercase font-weight-bold mb-4" style="color: #0e5380; font-size: 24px; border-bottom: 2px solid #0e5380; padding-bottom: 8px; display: inline-block;">
        <?= (@$title_cat != '') ? $title_cat : @$title_crumb ?>
    </div>
    <div class="content-main w-clear mb-4" style="line-height: 1.8; color: #333; font-size: 15px;">
        <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
    </div>
    <div class="share-section pt-3 border-top d-flex align-items-center flex-wrap">
        <strong class="mr-3" style="color: #555;">Chia sẻ:</strong>
        <div class="d-flex align-items-center flex-wrap">
            <div class="zalo-share-button d-inline-flex align-items-center px-3 py-1 text-white rounded mr-2" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= (!empty($optsetting['oaidzalo'])) ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize="true" style="background-color: #0068ff; cursor: pointer; text-decoration: none; height: 32px;">
                <img width="18" height="18" src="assets/images/zalo1.png" alt="Zalo" class="mr-2">
                <span style="color: #fff; font-size: 13px; font-weight: 600;">Share</span>
            </div>
            <div class="sharethis-inline-share-buttons d-inline-block"></div>
        </div>
    </div>
</div>