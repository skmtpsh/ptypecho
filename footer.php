<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. 备案/许可证编号: <a href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备2021002545</a> <a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a> <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</div>

<script>
var app = new Vue({
    el: '#app',
    data: function() {
        return {
            activeName: 'hot'
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
