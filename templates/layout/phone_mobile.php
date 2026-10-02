<section id="azt-contact-footer-outer">
    <div id="azt-contact-footer">
        <a class="open-menu">
            <img src="../assets/images/vtw-menu1.png" alt="menu"><span class="azt-contact-footer-btn-label">Menu</span>
        </a><a class="dangkyngay1">
            <span>
                <img src="../assets/images/gui-yeu-cau-icon1.png" alt="Kho theme">
                <span class="azt-contact-footer-btn-label">liên hệ</span>
            </span>
        </a>
        <a id="azt-contact-footer-btn-center" href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">
            <span class="azt-contact-footer-btn-center-icon">
                <span class="phone-vr-circle-fill"></span>
                <img src="../assets/images/button-contact-3399-1.jpg" alt="Liên hệ">
            </span>
            <span>
                <span class="azt-contact-footer-btn-label">
                    <span>Liên hệ</span>
                </span>
            </span>
        </a>
        <a href="<?=$optsetting['fanpage']?>" target="_blank">
            <span>
                <img src="../assets/images/messenger-icon1.png" alt="Messenger">
                <span class="azt-contact-footer-btn-label">Messenger</span>
            </span>
        </a>
        <a href="http://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>" target="_blank">
            <span>
                <img class="zalo-icon" src="../assets/images/zalo150-1.png" alt="Zalo">
                <span class="azt-contact-footer-btn-label">Zalo</span>
            </span>
        </a>
    </div>
</section>
<style>
#azt-contact-footer-outer {
    position: fixed;
    width: 100%;
    z-index: 100 !important;
    bottom: 0;
    display: none;
}

#azt-contact-footer:after {
    content: "";
    position: absolute;
    pointer-events: none;
    background-image: url(../assets/images/mb-footer-bg.svg);
    background-color: unset;
    background-position: center top;
    background-repeat: no-repeat;
    background-size: 100%;
    box-shadow: unset;
    height: 65px;
    width: 100%;
    margin-left: 0;
    margin-bottom: 0;
    left: 0;
    bottom: 0;
    z-index: -1;
}

#azt-contact-footer {
    border-bottom: 15px solid #fff;
    display: flex;
    max-width: 1200px;
    margin: auto;
    position: relative;
    padding-top: 5px;
}

#azt-contact-footer>a {
    position: relative;
    display: block;
    width: 25%;
    text-align: center;
    padding: 11px 0 0px 0;
    color: #313131;
}

#azt-contact-footer>span {
    display: block;
    width: 30px;
}

#azt-contact-footer span {
    display: block;
}

.azt-contact-footer-btn-label {
    padding: 0px 2px 0 2px;
    font-size: 11px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: bold;
}

#azt-contact-footer>a img {
    height: 30px;
    width: 30px
}

#azt-contact-footer-btn-center {
    position: relative;
    background: transparent !important;
}

#azt-contact-footer-btn-center .azt-contact-footer-btn-label {
    position: absolute;
    left: 50%;
    bottom: 2px;
    transform: translateX(-50%);
}

#azt-contact-footer-btn-center .azt-contact-footer-btn-label>span {
    padding: 0px 8px;
    background-image: linear-gradient(92.83deg, #d2280d 0, #583900 100%);
    border-radius: 30px;
    color: white;
    display: inline-block;
}

.azt-contact-footer-btn-center-icon {
    left: 50%;
    position: absolute;
    transform: translateX(-50%);
    background-image: linear-gradient(92.83deg, #d2280d 0, #8b6113 100%);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    top: -28px;
    text-align: center;
    box-shadow: rgb(0 0 0 / 15%) 0 -3px 10px 0px;
    border: 2px solid #fff;
}

.azt-contact-footer-btn-center-icon img {
    max-width: 20px;
    height: auto !important;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.phone-vr-circle-fill {
    width: 50px;
    height: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    box-shadow: 0 0 0 0 #0E68C8;
    border: 2px solid transparent;
    transition: all .5s;
    animation: zoom 1.3s infinite;
}

@keyframes zoom {
    0% {}

    70% {
        box-shadow: 0 0 0 15px transparent
    }

    100% {
        box-shadow: 0 0 0 0 transparent
    }
}

@media only screen and (max-width: 769px) {
    #azt-contact-footer-outer {
        display: block;
    }
    .support-online {
        display: none;
    }
}
</style>