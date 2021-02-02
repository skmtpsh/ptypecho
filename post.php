<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');

 ?>

        <div class="layoutGroup">
        <!-- banner space -->
        <div class="container">
            <div class="launchBannerGrid mb20">
            </div>
        </div>
        
        
        <!-- 特别推荐区域 -->
        <div class="container">
            <div class="flexBetweenMode">
               <div class="widgetWrapper flexWrapper max mb20 sta">
               <div class="originalImg"></div>
                <div class="Detail">
					<div class="textBox">
    		 	    <h1><?php $this->title(); ?></h1>
                    <div class="moreInfo">
                        文 / <span class="mr10"><?php $this->author->screenName(); ?></span>
                        阅读 / <span class="mr10"><?php Postviews($this); ?> </span>
                        <span class="mr10"><?php $this->date('F j, Y'); ?></span>
                    </div>
                    </div>

                    <div class="articleDetail cons">
                        <?php $this->content(); ?>    		 	    	 
        	        </div>
        	            
    	         </div>
    	         
    	         <?php $this->need('comments.php'); ?>

			   </div>
                
                <!-- ***** ***** ***** ***** ***** ***** ***** -->
                <!-- ***** 右侧列表 start ***** -->
                <?php $this->need('right - sidebar.php'); ?>
                <!-- ***** 右侧列表 end ***** -->
                <!-- ***** ***** ***** ***** ***** ***** ***** -->
                
                
            </div>
        </div>
        
   
	<!-- footer -->
	<?php $this->need('footer.php'); ?>
	<!-- end footer -->

        </div>

    </body>
</html>