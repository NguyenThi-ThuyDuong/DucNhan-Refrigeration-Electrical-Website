<div class="dangkyngay">
    <!-- <span>Đăng ký ngay</span> -->
    <span><i class="fas fa-user-headset"></i></span>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
</div>

<style>
.dangkyngay {
    position: fixed;
    left: 15px;
    bottom: 80px;
    z-index: 999;
}

.dangkyngay>span {
    position: relative;
    z-index: 2;
    display: block;
    width: 44px;
    background: var(--color-main);
    border: 1px solid var(--color-main);
    color: #fff;
    height: 44px;
    text-align: center;
    line-height: 40px;
    font-size: 22px;
    text-transform: capitalize;
    font-weight: 500;
    border-radius: 25px;
    cursor: pointer;
    border: 1px solid #ffffff4a;
}

.dangkyngay:hover span {
    background: #fff;
    color: var(--color-main);
}

.dangkyngay>div {
    z-index: -1 !important;
    width: 130% !important;
    height: 130% !important;
    border-radius: 50% !important;
    left: -15% !important;
    top: -15% !important;
    /* left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) !important; */
    background: var(--color-main);
    opacity: .4 !important;
    border: 1px solid #ffffff4a;
}
</style>