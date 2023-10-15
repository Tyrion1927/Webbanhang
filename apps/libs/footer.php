<footer>
    <div class="splitter"></div>
    <ul>
        <li>
            <div class="icon" data-icon="E"><a href="<?php echo $base; ?>"><img src="<?php echo $base; ?>/images/logo-f.png" style="width: 350px;" alt="logo footer" /></a></div>
            <p>Túi xách - Phụ kiện không thể thiếu của phái đẹp</p>
        </li>
        <li>
            <div class="text">
                <h4>LIÊN HỆ</h4>
                <div>Kênh mua sắm trực tuyến giá tốt hàng đầu Việt Nam</div>
                <br>
                <img alt="61/2 Quang Trung, P.10 Q. Gò Vấp, TP. HCM" src="<?php echo $base; ?>/images/icon/pre_footer_icon_address.png">
                <span>Đức Thắng Từ Liêm TP. HN</span><br>
                <img alt="61/2 Quang Trung, P.10 Q. Gò Vấp, TP. HCM" src="<?php echo $base; ?>/images/icon/pre_footer_icon_phone.png">
                <span>(+84) 9648 76096</span><br>
                <img alt="61/2 Quang Trung, P.10 Q. Gò Vấp, TP. HCM" src="<?php echo $base; ?>/images/icon/pre_footer_icon_email.png">
                <span>linkerpt.com@gmail.com</span>
            </div>
        </li>
        <li>
            <div class="icon" data-icon="s"></div>
            <div class="text">
                <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                <a href="">Quy định hình thức thanh toán</a><br>
                <a href="">Chính sách vận chuyển, giao nhận</a><br>
                <a href="">Chính sách đổi/trả hàng và hoàn tiền</a><br>
                <a href="">Chính sách bảo mật</a>
            </div>
        </li>
    </ul>

    <div class="bar">
        <div class="bar-wrap">
            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">License</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">About</a></li>
            </ul>

            <div class="social">
                <a href="#" class="fab fa-facebook-f">
                    <span class="info">
                    <span class="follow">Become a fan Facebook</span>
                    <span class="num">9,999</span>
                </span>
                </a>

                <a href="#" class="fab fa-twitter">
                    <span class="info">
                    <span class="follow">Follow us Twitter</span>
                    <span class="num">9,999</span>
                </span>
                </a>

                <a href="#" class="fab fa-google-plus-g">
                    <span class="info">
                    <span class="follow">Subscribe G+</span>
                    <span class="num">9,999</span>
                </span>
                </a>
            </div>
            <div class="clear"></div>
            <div class="copyright">&copy;  2018 All By Linkerpt</div>
        </div>
    </div>
</footer>
<a class="on_top" href="#top" style="display: block;"><i class="fa-arrow-circle-up fa"></i></a>
<script src="<?php echo $base ?>/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $base ?>/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo $base ?>/js/jquery.scrollUp.min.js" type="text/javascript"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:true,
        navText: ["<img src='<?php echo $base?>/images/icon/prev.png'>","<img src='<?php echo $base?>/images/icon/next.png'>"],
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:1
            }
        }
    })
    $(document).ready(function(){
        $(window).scroll(function(){
            if ($(this).scrollTop() > 600) {
                $('.on_top').fadeIn();
            } else {
                $('.on_top').fadeOut();
            }
        });
        $('.on_top').click(function(){
            $("html, body").animate({scrollTop: 0}, 700);
            return false;
        });
    });
</script>
<style>
    .fb-livechat,
    .fb-widget{display: none}
    .ctrlq.fb-button, .ctrlq.fb-close{
        position: fixed; right: 24px; cursor: pointer
    }
    .ctrlq.fb-button{
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 30px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
        -
    }
    .ctrlq.fb-button:focus, .ctrlq.fb-button:hover{
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
    }
    .fb-widget{background: #fff;
        z-index: 1000;
        position: fixed;
        width: 360px;
        height: 435px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        right: 24px;
        border-radius: 6px;
        -o-border-radius: 6px;
        -webkit-border-radius: 6px;
        box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }
    .fb-credit{
        text-align: center;
        margin-top: 8px}
    .fb-credit a{
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0; font-weight: 400
    }
    .ctrlq.fb-overlay{
        z-index: 0;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition:opacity .4s, visibility .4s;
        transition:opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .05);
        display: none
    }
    .ctrlq.fb-close{
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px}
    .ctrlq.fb-close::after{
        content: "X";
        font-family:
                sans-serif
    }
    .bubble{
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px; left: -5px;
        border-radius: 50%;
    }
    .bubble-msg{
        width: 120px;
        left: -140px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;}</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/linkerptvn" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div>
        <div class="fb-credit">
            <a href="https://linkerpt.com" target="_blank">Powered by StoreHUMG</a> </div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/linkerptvn" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"><div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a>
</div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        function detectmob(){
            if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) )
            {return true;}
            else{return false;}
                            }
            var t={
            delay: 125,
                overlay: $(".fb-overlay"),
                widget: $(".fb-widget"),
                button: $(".fb-button")};
        setTimeout(function(){
            $("div.fb-livechat").fadeIn()}, 8 * t.delay);
        if(!detectmob()){
            $(".ctrlq").on("click",
                function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});
</script>