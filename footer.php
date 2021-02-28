<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <p>&copy; <?php echo date('Y'); ?>
        <span><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</span>
        <span>备案/许可证编号: <a href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备2021002545号-1</a></span>
        <span><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></span>
        <span><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></span>
        <span>耗时：<i class="el-icon-loading"></i> <?php echo timer_stop();?></span>
    </p>
</footer><!-- end #footer -->

<el-drawer
  title="我是标题"
  :visible.sync="drawer"
  :direction="direction"
  :before-close="handleClose">
  <span>我来啦!</span>
</el-drawer>

<?php $this->footer(); ?>
</div>

<script>
var app = new Vue({
    el: '#app',
    data: function() {
        return {
            activeName: 'hot',
            drawer: false,
            direction: 'rtl'
        }
    },
    methods: {
        handleClick: function(tab, event) {
            console.log(tab, event)
        }
    }
})
</script>
</body>
</html>
