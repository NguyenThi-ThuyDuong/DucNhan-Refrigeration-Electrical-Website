<ul class="nav nav-pills nav_wrap" id="pills-tab" role="tablist" style="justify-content: center;">
    <?php foreach ($danhmuc_list as $k => $v) { ?>
    <li class="nav-item nav_sp">
        <a class="nav-link <?= $k == 0 ? 'active' : '' ?> text-align-center" id="pills-<?= $v['tenkhongdauvi'] ?>-tab"
            data-toggle="pill" href="#pills-<?= $v['tenkhongdauvi'] ?>" role="tab"
            aria-controls="pills-<?= $v['tenkhongdauvi'] ?>" aria-selected="true"><span><?= $v['tenvi'] ?></span></a>
    </li>
    <?php } ?>
</ul>
<div class="tab-content" id="pills-tabContent">
    <?php foreach ($danhmuc_list as $key => $value1) { ?>
    <?php $sp_for_list = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, ngaytao, photo, id, gia from #_product where id_list = ? and hienthi > 0 and type='san-pham' order by stt,id desc limit 8
            ", array($value1['id'])); ?>
    <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="pills-<?= $value1['tenkhongdauvi'] ?>"
        role="tabpanel" aria-labelledby="pills-<?= $value1['tenkhongdauvi'] ?>-tab">
        <div class="loadkhung_product1 mb-3">
            <?php foreach ($sp_for_list as $key => $value) { ?>
            <div class="sp_item">
                <a class="scale-img" href="<?= $value['tenkhongdauvi'] ?>">
                    <img onerror="this.src='<?= THUMBS ?>/300x250x1/assets/images/noimage.png';"
                        src="<?= THUMBS ?>/300x250x1/<?= UPLOAD_PRODUCT_L . $value['photo'] ?>"
                        alt="<?= $value['ten' . $lang] ?>" />
                </a>
                <div class="sp_content">
                    <a href="<?= $value['tenkhongdauvi'] ?>" title="<?= $value['ten' . $lang] ?>"
                        class="sp_name"><?= $value['ten' . $lang] ?></a>
                    <div class="sp_mota">
                        <?= htmlspecialchars_decode($value['motavi']) ?>
                    </div>
                    <?php if($value['gia']) { ?>
                    <div class="sp_gia">
                        Giá:
                        <strong><?= $func->format_money($value['gia']) ?></strong>
                    </div>
                    <?php } else { ?>
                    <div class="sp_gia">
                        <a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">Liên hệ
                            <?= $optsetting['hotline'] ?> </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="<?= $value1['tenkhongdauvi'] ?>" class="btn_lienhe m-auto">Xem thêm</a>
    </div>
    <?php } ?>
</div>