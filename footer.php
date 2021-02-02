 <div class="footerGrid">
     <div class="topWrapper">
        <div class="menuWrap">
            <div class="menuBox">
            <?php if ($this->options->footerlist): ?><?php if($this->options->footerlist){$this->options->footerlist();} ?><?php endif; ?>
            </div>
            <div class="copyright viaWrapper">相信有一天, 理想主义终将所向披靡.</div>
        </div>
     </div>
     <div class="midWrapper">
         <div class="article">
             <p><?php if ($this->options->footercor): ?><?php if($this->options->footercor){$this->options->footercor();} ?><?php endif; ?></p>
             <p>
             <?php if ($this->is('index')): ?><?php if ($this->options->footernav): ?><p class="links"><?php _e('友情链接：'); ?><?php if($this->options->footernav){$this->options->footernav();} ?><?php endif; ?><?php endif; ?>
         </div>
     </div>
</div>

<!--widget-->
<div class="fixedWidget" id="RbWidget">
    <div href="javascript:;" class="layoutMenu" id="layoutMenu">
        <i class="icon iconfont icon-zengjia1 icondgy"></i>
    </div>
    <a href="" target="_blank" class="mail" title="联系我们"></a>
    <a href="javascript:;" class="top backTop" title="返回顶部"></a>
</div>
<script>
    var scrollTop = function(){
    	var offset = 300,
    		offset_opacity = 1200,
    		scroll_top_duration = 700,
    		$back_to_top = $('.backTop');
    	$(window).scroll(function(){
    		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('backTopVisible') : $back_to_top.removeClass('backTopVisible cd-fade-out');
    		if( $(this).scrollTop() > offset_opacity ) { 
    			$back_to_top.addClass('cd-fade-out');
    		}
    	});
    	$back_to_top.on('click', function(event){
    		event.preventDefault();
    		$('body,html').animate({
    			scrollTop: 0 ,
    		 	}, scroll_top_duration
    		);
    	});
    };
    
$(function(){
    scrollTop();
    $('#layoutMenu').click(function(){
        $('#layoutNavGrid .navGrid, .layoutGroup').toggleClass('layout');
        $('body').toggleClass('layoutLocked');
    });
    $('#closeMenuBtn').click(function(){
        $('#layoutNavGrid .navGrid, .layoutGroup').removeClass('layout');
        $('body').removeClass('layoutLocked');
    });

});



</script>



<?php $this->footer(); ?>
<!--[if lt IE 9]>
<div class="lowBrowserGroup">
    <div class="lowBrowserWrapper">
        <div class="title">
            哎呀，您的浏览器版本太低了，我们推荐使用以下浏览器！
        </div>
        <div class="browserWrap">
            <div class="item">
                <a href="https://www.google.cn/chrome/">
                    <div class="img chrome"></div>
                    <div class="detail">chrome</div>
                </a>
            </div>
            <div class="item">
                <a href="http://www.firefox.com.cn/">
                    <div class="img firefox"></div>
                    <div class="detail">firefox</div>
                </a>
            </div>
            <div class="item">
                <a href="https://browser.360.cn/">
                    <div class="img i360"></div>
                    <div class="detail">360</div>
                </a>
            </div>
            <div class="item">
                <a href="https://browser.qq.com/?adtag=duoguyu">
                    <div class="img qq"></div>
                    <div class="detail">qq</div>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="title">
            当然，您也可以直接扫描下方二维码，打开小程序进行访问！
        </div>
        <div class="wechatImg">
            <a href="https://www.duoguyu.com/" target="_blank" title="扫码体验，多骨鱼小程序"><img src="/uploads/202004/19/200419013104923.jpg"></a>        </div>
        
    </div>
</div>
<![endif]-->  