 <div class="flexWrapper right" id="secondary">
                    
                    <?php if ($this->options->rightad): ?>
                    <div class="widgetWrapper p0 mb20">
                        <div class="adBox so_img">
                            <?php $this->options->rightad(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- **** 普通文章列表 START **** -->
                    <div class="widgetWrapper mb20">
                        <div class="titleWrapper">
                            <h3 class="title"><b>栏目推荐+</b></h3>
                        </div>
                        <ul class="articleBox mb20">

						     <?php $i=1; $this->widget('Widget_Contents_Post_Recent','pageSize=3')->to($recent); if($recent->have()): while($recent->next()): ?>
                             <?php if ($i == 1):  ?>
        					 <li>
                                <a href="<?php $recent->permalink();?>" title="<?php $recent->title();?>" target="_blank">
                                <div class="widgetWrapper p0 mb10">
                                <img class="adImg" src="<?php $recent->fields->img(); ?>" alt="<?php $recent->title();?>" />
                                </div>
                                <h4><?php $recent->title();?></h4>
                                <p><?php $recent->tags('', false, ''); ?> · <?php $recent->date('F j, Y'); ?></p>
                                </a>
                            </li>
                            <?php else : ?>
        					<li>
                                <a href="<?php $recent->permalink();?>" title="<?php $recent->title();?>" target="_blank">
                                <h4><?php $recent->title();?></h4>
                                <p><?php $recent->tags('', false, ''); ?> · <?php $recent->date('F j, Y'); ?></p>
                                </a>
                            </li>
                            <?php endif;?> 
						    <?php $i++; endwhile; endif;?> 
        				
                        </ul>
                        <?php if ($this->options->rightadsec): ?>
                        <div class="widgetWrapper p0">
                            <div class="adBox so_img">
                                 <?php $this->options->rightadsec(); ?>  
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    <!-- **** 普通文章列表 END **** -->
                    
                    <!-- 活跃用户 -->
                    <div class="widgetWrapper mb20">
                        <div class="titleWrapper">
                            <h3 class="title"><b>活跃用户</b></h3>
                        </div>
                        <ul class="memberBox">
                            
                            <?php
$period = time() - 2592000; // 单位: 秒, 时间范围: 30天
$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
->select('COUNT(author) AS cnt','author', 'max(authorId) authorId', 'max(mail) mail')                                      
->from('table.comments')
->where('created > ?', $period )
->where('status = ?', 'approved')
->where('type = ?', 'comment')
->group('author')                                    
->order('cnt', Typecho_Db::SORT_DESC)
->limit('9')
);
$mostactive = '';
$avatar_path = 'http://cdn.v2ex.com/gravatar/';
foreach ($counts as $count) {
  $avatar = $avatar_path . md5(strtolower($count['mail'])) . '.jpg';   
  $imgUrl = getGravatar($count['mail']);  
  $c_url = '<li class="item"><img class="avatar" src="' . $imgUrl . '"><p>' . $count['author'] . '</p></li>';
  echo ''.$c_url.'';  
    
}?>
                            
                            
                         </ul>
                    </div>
                    

        
                </div>