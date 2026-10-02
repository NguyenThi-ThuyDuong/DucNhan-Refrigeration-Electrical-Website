<div class="row">
    <div class="col-md-6 tt_l">
        <?php foreach ($tintuc as $key => $value) { if($key == 0){ continue; }?>
        <div class="tintuc_item tt_row">
            <a class="scale-img tintuc_img" href="<?= $value['tenkhongdauvi'] ?>">
                <img onerror="this.src='<?= THUMBS ?>/300x200x1/assets/images/noimage.png';"
                    src="<?= THUMBS ?>/300x200x1/<?= UPLOAD_NEWS_L . $value['photo'] ?>"
                    alt="<?= $value['ten' . $lang] ?>" />
                <div class="tintuc_time">
                    <p>
                        T<?=date("m",$value['ngaytao'])?>
                    </p>
                    <span>
                        <?=date("Y",$value['ngaytao'])?>

                    </span>
                </div>
            </a>
            <div class="tintuc_content">
                <div class="tintuc_ten">
                    <?= $value['ten' . $lang] ?>
                </div>
                <div class="tintuc_mota">
                    <?= $value['mota' . $lang] ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="col-md-6">
        <div class="tintuc_item">
            <a class="scale-img tintuc_img" href="<?= $tintuc[0]['tenkhongdauvi'] ?>">
                <img onerror="this.src='<?= THUMBS ?>/600x380x1/assets/images/noimage.png';"
                    src="<?= THUMBS ?>/600x380x1/<?= UPLOAD_NEWS_L . $tintuc[0]['photo'] ?>"
                    alt="<?= $tintuc[0]['ten' . $lang] ?>" />
                <div class="tintuc_time">
                    <p>
                        T<?=date("m",$tintuc[0]['ngaytao'])?>
                    </p>
                    <span>
                        <?=date("Y",$tintuc[0]['ngaytao'])?>

                    </span>
                </div>
            </a>
            <div class="tintuc_content">
                <div class="tintuc_ten">
                    <?= $tintuc[0]['ten' . $lang] ?>
                </div>
                <div class="tintuc_mota">
                    <?= $tintuc[0]['mota' . $lang] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.tintuc_item {
    border-radius: 15px;
    overflow: hidden;
    background: #fff;
}

.tt_l {}

.tt_l .tt_row:nth-child(even) {
    flex-direction: row-reverse;
}

.tt_row {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
}

.tt_row .tintuc_img {
    width: 35%;
}

.tt_row .tintuc_content {
    flex: 2;
}

.tt_row .tintuc_ten {
    text-align: left;
    font-size: 16px;
}

.tintuc_img {
    position: relative;
    border-radius: 15px;

    img {
        width: 100%;
        height: 100% !important;
        object-fit: cover;
    }
}

.tintuc_time {
    position: absolute;
    width: 45px;
    line-height: 1.2;
    padding: 5px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 600;
    text-align: center;
    /* height: 40px; */
    left: 20px;
    top: 20px;
    display: flex;
    flex-direction: column;
    z-index: 1;
    background: var(--color-green);
    color: #fff;

    p {
        display: block;
        padding-bottom: 5px;
        margin-bottom: 5px;
        border-bottom: 1px solid #ffffff7a;
    }
}

.tintuc_content {
    padding: 10px;
}

.tintuc_ten {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 6px;
    text-align: center;
}

.tintuc_mota {
    font-size: 15px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
</style>