 <div class="flexWrapper left">
                    
                    <!-- ***** 图文列表 START **** -->
                    <div class="widgetWrapper mb20">
                        <div class="titleWrapper">
                            <h3 class="title"><b>热门推荐</b></h3>
                        </div>
                        <div class="layoutWrapper">        					
                            

							<?php getHotPosts(); ?>                            
                            
                            
                       </div>
                    </div>
                    <!-- ***** 图文列表 END **** -->
                    
                    <!-- **** AD START **** -->
                    <?php if ($this->options->rightad): ?>
                    <div class="widgetWrapper p0 mb20">
                        <div class="adBox so_img">
                        <?php $this->options->rightad(); ?>    
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- **** AD END **** -->
                    
                    <div class="widgetWrapper mb20">
                        <div class="titleWrapper">
                            <h3 class="title"><b>栏目推荐+</b></h3>
                        </div>
                        <ul class="articleBox">
        					 <?php $this->widget('Widget_Archive@indextuis', 'pageSize=5&type=category', 'mid=1')->to($categoryPosts); ?>
							<?php while($categoryPosts->next()): ?>
        					 <li>
                                <a href="<?php $categoryPosts->permalink(); ?>" title="“<?php $categoryPosts->title(); ?>”" target="_blank">
                                <h4><?php $categoryPosts->title(); ?></h4>
                                <p><?php $categoryPosts->tags('，', false, ''); ?></p>
                                </a>
                            </li>
                            <?php endwhile; ?>
        					
        					                        </ul>
        				<?php if ($this->options->txtadimg): ?>	                        
                        <div class="widgetWrapper p0">
                            <div class="adBox so_img">
                                <?php $this->options->txtadimg(); ?>   
                            </div>
                        </div>
                         <?php endif; ?>
                        
                    </div>
                    
                    <!-- 最新留言 -->
                    <div class="widgetWrapper mb20">
                        <div class="titleWrapper">
                            <h3 class="title"><b>最新留言</b></h3>
                        </div>
                        <div class="commentWrapper">
                            <ul class="itemUl">
                            	
                            	    <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true&pageSize=4')->to($comments); ?>
                            	    <?php while($comments->next()): ?>
                                    <li class="item">
                                    <div class="username"># <?php $comments->author(); ?> <span><?php $comments->dateWord(); ?></span></div>
                                    <div class="commentGroup">
                                        <p class="detailText"><?php $comments->excerpt(25, '...'); ?></p>
                                    </div>
                                    </li>
                                    <?php endwhile; ?> 
                                    
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>