<ul class="all-icons">
    <!-- 			Trang chủ -->
    <li>
        <a href="./" rel="nofollow">
            <img src="assets/images/icon_home.png" alt="Trang chủ">
            <span class="">Trang chủ</span>
        </a>
    </li>

    <!-- 			Hotline -->
    <li><a class="icon-phone hl" href="tel:<?=preg_replace('/[^0-9]/','', !empty($optsetting['hotline']) ? $optsetting['hotline'] : '0976968048');?>" target="_blank"
            rel="nofollow"><svg class="homenest-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                width="24" height="24" fill="white" style="display: inline-block;">
                <path
                    d="M493.4 24.6l-104-24c-11.7-2.7-23.9 3.3-29.2 14.7l-48 112c-4.2 9.8-1.4 21.3 6.8 28.8l60.6 52.4c-36 76-98.5 138.5-174.5 174.5l-52.4-60.6c-7.5-8.2-19-11-28.8-6.8l-112 48c-11.4 4.9-17.4 17.3-14.7 29.2l24 104c2.6 11.3 13.1 19.4 24.8 19.4 256 0 464-208 464-464 0-11.7-8.1-22.2-19.4-24.8z">
                </path>
            </svg><span class="">Hotline</span></a></li>
    <!-- 			Zalo -->
    <li><a href="https://zalo.me/<?=preg_replace('/[^0-9]/','', !empty($optsetting['zalo']) ? $optsetting['zalo'] : '0976968048');?>" target="_blank"
            rel="nofollow"><svg class="homenest-icon" width="100%" height="100%" viewBox="7 8 35 35" version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                xmlns:serif="http://www.serif.com/"
                style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2; display: inline-block;">
                <path
                    d="M25.004,10.45l-0.015,-0c-7.978,-0 -14.544,6.565 -14.544,14.543c0,2.609 0.702,5.17 2.032,7.415l-1.951,5.367c-0.053,0.145 -0.08,0.298 -0.08,0.453c0,0.725 0.597,1.322 1.322,1.322c0.154,0 0.307,-0.027 0.452,-0.079l5.368,-1.952c2.245,1.33 4.807,2.031 7.416,2.031c7.982,0 14.551,-6.568 14.551,-14.55c-0,-7.982 -6.569,-14.55 -14.551,-14.55Zm0.939,18.021l-0,0.021c-0,0.293 0.254,0.548 0.56,0.548l0.752,-0l0,-6.143l-1.312,-0l-0,0.435c-0.528,-0.386 -1.181,-0.613 -1.888,-0.613c-1.759,-0 -3.186,1.427 -3.186,3.186c-0,1.759 1.427,3.186 3.186,3.186c0.706,0 1.359,-0.23 1.888,-0.62Zm7.976,-5.803c-1.772,-0 -3.212,1.44 -3.212,3.211c0,1.772 1.44,3.212 3.212,3.212c1.771,-0 3.211,-1.44 3.211,-3.212c0,-1.771 -1.44,-3.211 -3.211,-3.211Zm-5.073,6.372l0.931,-0l-0,-8.131l-1.402,-0l-0,7.659c-0,0.255 0.204,0.472 0.471,0.472Zm-8.321,-8.131l-6.538,-0l-0,1.402l4.537,-0l-4.474,5.544c-0.14,0.204 -0.242,0.395 -0.242,0.828l0,0.357l6.169,-0c0.306,-0 0.56,-0.255 0.56,-0.561l0,-0.752l-4.766,0l4.206,-5.276c0.063,-0.077 0.178,-0.217 0.229,-0.28l0.026,-0.039c0.242,-0.357 0.293,-0.662 0.293,-1.032l-0,-0.191Zm3.53,6.869c-1.033,0 -1.874,-0.841 -1.874,-1.873c0,-1.032 0.841,-1.873 1.874,-1.873c1.032,-0 1.873,0.841 1.873,1.873c0,1.032 -0.828,1.873 -1.873,1.873Zm9.864,0c-1.045,0 -1.886,-0.841 -1.886,-1.886c-0,-1.045 0.841,-1.886 1.886,-1.886c1.045,-0 1.886,0.841 1.886,1.886c0,1.045 -0.841,1.886 -1.886,1.886Z"
                    style="fill:#fff;"></path>
            </svg><span class="">Zalo</span></a>
    </li>
    <li>
        <a href="<?=!empty($optsetting['fanpage']) ? $optsetting['fanpage'] : '#'?>" rel="nofollow" target="_blank">
            <img src="assets/images/mess.png" alt="Messenger">
            <span class="">Messenger</span>
        </a>
    </li>

    <!-- 			Tiktok -->
    <!-- <li><a href="https://www.tiktok.com/@homenest.software" target="_blank" rel="”nofollow”"><svg class="homenest-icon"
                fill="#fff" viewBox="0 0 24 24" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg"
                style="display: inline-block;">
                <path
                    d="M21,7V9a1,1,0,0,1-1,1,8,8,0,0,1-4-1.08V15.5A6.5,6.5,0,1,1,6.53,9.72a1,1,0,0,1,1.47.9v2.52a.92.92,0,0,1-.28.62,2.49,2.49,0,0,0,2,4.23A2.61,2.61,0,0,0,12,15.35V3a1,1,0,0,1,1-1h2.11a1,1,0,0,1,1,.83A4,4,0,0,0,20,6,1,1,0,0,1,21,7Z">
                </path>
            </svg><span class="">Tiktok</span></a></li>

    <li><a href="https://wa.me/+840898994298" target="_blank" rel="”nofollow”"><svg class="homenest-icon"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" style="display: inline-block;">
                <path
                    d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z">
                </path>
            </svg><span class="">WhatsApp</span></a></li> -->
</ul>

<style>
/* Start tab icon */
ul.all-icons {
    position: fixed;
    top: 50%;
    right: 5px;
    list-style: none;
    transform: translateY(-50%);
    border-radius: 5px;
    overflow: hidden;
    transition: all .3s;
    z-index: 99;
}

ul.all-icons.hide {
    right: -50px;
}

ul.all-icons>li:not(:last-of-type)>a {
    /* 		border-bottom: 1px solid #fff; */
    box-sizing: border-box;
}

ul.all-icons>li>a {
    --size: 60px;
    display: flex;
    width: var(--size);
    height: var(--size);
    color: #fff;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 5px;
}

ul.all-icons>li>a::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    /* background: linear-gradient(92.16deg, #020C6A 25%, #1A85F8 56.7%, #66E5FB 75%); */
    background: linear-gradient(92.16deg, var(--color-main1) 25%, var(--color-main2) 56.7%, var(--color-main3) 75%);
    transform: scale(2) rotate(0deg);
    transition: all .5s ease;
}

ul.all-icons>li>a:hover::before {
    transform: scale(2) rotate(-180deg);
}

ul.all-icons>li>a>i {
    font-size: 19px;
    margin-bottom: 3px;
    margin-top: 5px;
}

ul.all-icons>li>a img {
    width: 23px !important;
    margin-bottom: 5px;
}

ul.all-icons>li>a svg {
    width: 23px !important;
    max-height: 23px;
    margin-bottom: 5px;
}

ul.all-icons>li>a.hl svg {
    width: 20px !important;
}

ul.all-icons>li>a>span {
    font-size: 10px;
    line-height: 1em;
    font-weight: 300;
}
</style>

<script>
const target = document.querySelector('.all-icons');
let lastScroll = 0;
let isHovering = false;

// Hover: CHỈ MỞ, không đóng
target.addEventListener('mouseenter', () => {
    isHovering = true;

    // nếu đang đóng thì mở ra
    if (target.classList.contains('hide')) {
        target.classList.remove('hide');
    }
});

// Rời chuột: không làm gì cả
target.addEventListener('mouseleave', () => {
    isHovering = false;
});

// Scroll quyết định đóng / mở
function handleScroll() {
    let currentScroll = window.pageYOffset;

    if (!isHovering) {
        if (currentScroll > lastScroll) {
            // Scroll xuống → ĐÓNG
            target.classList.add('hide');
        } else {
            // Scroll lên → MỞ
            target.classList.remove('hide');
        }
    }

    lastScroll = currentScroll;
}

window.addEventListener('scroll', handleScroll);
</script>
