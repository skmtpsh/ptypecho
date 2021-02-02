<?php
/**
 * 用于作品展示、资源下载，行业垂直性网站、个人博客，简洁大气、优化SEO、多功能配置。
 *
 * @package s_blog
 * @author Vv
 * @version 1.0
 * @link https://www.dpaoz.com/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');

 ?>

        <div class="layoutGroup">
        
        <!-- banner space -->
        <div class="container">
            <div class="launchBannerGrid mb20">
                
                <!-- banner -->
                <div class="bannerGroup">
                    <div class="swiper-container" id="indexFocus">
                        <div class="bannerGroup swiper-wrapper">
                            
						 <?php hdinfo(); ?>  
                   
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                
                <!-- 扩展 -->
                <div class="extendGroup">
                    <div class="widgetWrapper p0">
                        <div class="adBox so_img">
                            <?php if ($this->options->soimgad): ?>
                            <?php $this->options->soimgad(); ?>               
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- 搜索框 -->
                    <!-- searchWrapper -->
                    <div class="widgetWrapper">
                        <div class="searchWrapper extend">
                            <div class="searchBox">
                                <form method="get" id="searchform" action="" target="_blank" onsubmit="return checkSearch()">
                                    <div class="searchtxt">
                                        <input name="s" id="s" type="text" placeholder="请输入关键词进行搜索。" class="searchInput"/>
                                    </div>
                                    <button class="searchBtn" type="submit"><i class="icon iconfont icon-sousuo"></i></button>
                                </form>
                            </div>
                            <!-- 标签组 -->
                            <div class="tagBox">
                             <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 6))->to($tags); ?>
                             <?php if($tags->have()): ?>
                             <a href="<?php $tags->permalink(); ?>" class="tag" target="_blank"><?php $tags->name(); ?></a>
                             <?php endif; ?>
                             </div>
                        </div>
                        <script type="text/javascript">
                        	function checkSearch(){
                        	    var searchInput = $('#searchInput').val();
                        	    var searchVal = $.trim(searchInput);
                        	    if(searchVal == ''){
                        			layer.msg("哎呀，你好像忘记输入搜索内容了！");
                        			return false;
                        	    }
                        	    if(searchVal.length < 2){
                        			layer.msg("搜索关键字至少需要2个字哟！");
                        			return false;
                        	    }
                        		return true;
                        	}
                        </script>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        
        <!-- 特别推荐区域 -->
        <div class="container">
            <div class="flexBetweenMode">
               
			    <!-- ***** 左边列表 start ***** --> 
                <?php $this->need('left - sidebar.php'); ?>
                <!-- ***** ***** ***** ***** ***** ***** ***** -->
                <!-- ***** 中间列表 start ***** -->
                <div class="flexWrapper mid">
                    <!-- 置顶 -->
                    <?php if ($this->options->adimg): ?>
                    <div class="widgetWrapper mb20">
                        <div class="focusBox"> 
                            <div class="ad_img">  
                            <?php $this->options->adimg(); ?>
                            </div>
        				</div>
                    </div>
                    <?php endif; ?>
                    <!-- 最新内容 -->

    				<?php while($this->next()): ?>		            		    
                    <div class="richTextItem mb20">
                        
                            <div class="tagWrapper">
                            <div class="tagBox"><span class="i">#</span><?php $this->category(',', true, 'none'); ?></div>
                            </div>
                            <h4 class="title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a><?php if(timeZone($this->date->timeStamp)) echo '<span class="badge arc_v2">最新</span>'; ?></h4>
                            <div class="article">
                                <a href="<?php $this->permalink(); ?>"><img class="focus" src="<?php $this->fields->img(); ?>" alt="<?php $this->title(); ?>" /></a>
                                <div class="textBox">
                                    <p class="mb15"><?php $this->excerpt(60, '...');?></p>
                                    <!--<p>资源 · 20天前</p>-->
                                    <p class="tag">
                                        <?php $this->date('F j, Y'); ?> · 
                                        <?php Postviews($this); ?> 阅读 ·
             							<?php $this->tags('', true, 'none'); ?>
             					    </p>
                                </div>
                            </div>
                           
                    </div>
                    <?php endwhile; ?>


                    
                    
                    
                    <!-- view more -->
					<?php $this->pageNav('<', '>', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'page-navigator ', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'nexts',)); ?>				
					<!-- end view more -->
                    
                  
                      		                		    
                   
                    
    		            		        
                </div>
                <!-- ***** 中间列表 end ***** -->
                <!-- ***** ***** ***** ***** ***** ***** ***** -->
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