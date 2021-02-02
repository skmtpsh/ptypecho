/*
*
*  name: detailMotheds
*  author: tonney
*  date: 2019/04/17 14:15
*
*/
$(function(){
    
    indexBannerInit();
    
    /*
    //加载页面时执行一次
    resourceChange();
    //监听浏览器宽度的改变
    window.onresize = function(){
        //console.log('监听浏览器宽度的改变');
        resourceChange();
    };
    */
    
});

// 移动端菜单 - open
var touchMenuOpen = function(){
    $('#touchMenuOpen').on('click',function(){
        $('#menuLayout').addClass('on');
    })
}
// 移动端菜单 - close
var touchMenuClose = function(){
    $('#touchMenuClose').on('click',function(){
        $('#menuLayout').removeClass('on');
    })
}

var indexBannerInit = function(){
    // indexFocusSwiper
    var indexFocusSwiper = new Swiper ('#indexFocus', {
        autoplay: { disableOnInteraction: false, delay: 5000 },
        pagination: { el: '#indexFocus .swiper-pagination' },
        navigation: { nextEl: '#indexFocus .swiper-button-next', prevEl: '#indexFocus .swiper-button-prev' },
        effect: 'fade',
        loop: true
    });
}

var resourcePcInit = function(){
    indexBannerInit();
    // resourceGrid
    var resourceSwiper = new Swiper ('#resourceGrid', {
        autoplay: { disableOnInteraction:false, delay:3600,},
        navigation: { nextEl: '#resourceGrid .swiper-button-next', prevEl: '#resourceGrid .swiper-button-prev',},
        slidesPerView: 3,
        //spaceBetween: 20,
        //loop: true,
    });
}
var resourceWapInit = function(){
    indexBannerInit();
    // resourceGrid
    var resourceSwiper = new Swiper ('#resourceGrid', {
        autoplay: { disableOnInteraction:false, delay:3600,},
        navigation: { nextEl: '#resourceGrid .swiper-button-next', prevEl: '#resourceGrid .swiper-button-prev',},
        slidesPerView: 2,
        //spaceBetween: 20,
        //loop: true,
    });
}



jQuery(document).ready(function() {
jQuery('#secondary').theiaStickySidebar({
// Settings 距离浏览器顶部10px
additionalMarginTop: 10
 });
});