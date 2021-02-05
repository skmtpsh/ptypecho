<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. 备案/许可证编号: <a href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备2021002545</a></p>
    <p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.</p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</div>

<script>
var app = new Vue({
    el: '#app',
    data: function() {
        return {
            activeName: 'hot',
            visible: false,
            images: [
                'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.mp.itc.cn%2Fupload%2F20170723%2F504dea5ff5404c9c9d18d4e1426c74b9_th.jpg&refer=http%3A%2F%2Fimg.mp.itc.cn&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1615107736&t=ad95d4d6cef33bc3420f41150f51df63',
                'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fpic.huodongjia.com%2Fevent%2F2015-12-01%2Fevent155380.jpg&refer=http%3A%2F%2Fpic.huodongjia.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1615107736&t=c7c22e8b9590e88dc76495fed13c02d2',
                'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=1545262284,771499180&fm=26&gp=0.jpg',
                'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fi3.sinaimg.cn%2FIT%2Fcr%2F2012%2F0129%2F1137216345.jpg&refer=http%3A%2F%2Fi3.sinaimg.cn&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1615107595&t=4f189e4a317734476d6b32a8c0da5d71'
            ]
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
