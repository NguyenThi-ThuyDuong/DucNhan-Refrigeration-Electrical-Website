<?php if(isset($popup) && $popup['hienthi'] == 1) { ?>
<!-- Modal popup -->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popupModalLabel"><?=$popup['ten'.$lang]?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?=$popup['link']?>"><img src="<?=THUMBS?>/800x530x1/<?=UPLOAD_PHOTO_L.$popup['photo']?>"
                        alt="Popup"></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal notify -->
<div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popup-notify-label"><?=thongbao?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?=thoat?></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal form -->
<div class="modal modal-custom fade" id="popup-form" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 d-block text-center" id="popup-notify-label"><strong>ĐĂNG KÝ TƯ
                        VẤN</strong></h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> -->
            </div>
            <div class="modal-body">
                <form class="form-contact validation-contact" novalidate method="post" action=""
                    enctype="multipart/form-data" style="width: 100%;" autocomplete="on">
                    <div class="row">
                        <div class="input-contact col-sm-6">
                            <input type="text" class="form-control" autocomplete="name" id="ten" name="name-newsletter"
                                placeholder="Họ tên" required />
                            <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                        </div>
                        <div class="input-contact col-sm-6">
                            <input type="number" class="form-control" autocomplete="tel" id="dienthoai"
                                name="phone-newsletter" placeholder="Số điện thoại" required />
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-contact col-sm-12">
                            <input type="email" class="form-control" autocomplete="email" id="email"
                                name="email-newsletter" placeholder="Email" required />
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="input-contact">
                                <textarea class="form-control" id="noidung" name="noidung-newsletter"
                                    placeholder="Nội dung cần tư vấn ..." required></textarea>
                                <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input
                                style="width: 100%; height: 100%;font-size: 16px;font-weight: 500;background: var(--color-main); border: 0;"
                                type="submit" class="btn btn-primary" name="submit-newsletter" value="ĐĂNG KÝ"
                                disabled />
                        </div>
                    </div>
                    <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                </form>
            </div>
            <!-- <div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?=thoat?></button>
			</div> -->
        </div>
    </div>
</div>

<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popup-cart-label"><?=giohangcuaban?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<?php 
/*
	<!-- Modal prototype -->
	<button type="button" class="btn btn-primary open-modal-cart" data-toggle="modal" data-target=".exampleModal">
		Open Modal
	</button>
	<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Modal title</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
*/ 
?>