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
  title=""
  :visible.sync="drawer"
  :direction="direction"
  :before-close="handleClose">
  <span>我来啦!</span>
</el-drawer>
<el-dialog
  title="用户登录"
  :visible.sync="dialogLoginVisible"
  width="30%"
  :before-close="handleLoginClose">
<form action="<?php $this->options->loginAction()?>" method="post" name="login" rold="form">
    <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
    <input type="text" name="name" autocomplete="username" placeholder="请输入用户名" required/>
    <input type="password" name="password" autocomplete="current-password" placeholder="请输入密码" required/>
    <button type="submit">登录</button>
</form>
</el-dialog>
<?php $this->footer(); ?>
</div>

<script>
var app = new Vue({
    el: '#app',
    data: function() {
        return {
            activeName: 'all',
            drawer: false,
            direction: 'rtl',
            dialogLoginVisible: false
        }
    },
    methods: {
        handleLogin() {
            this.dialogLoginVisible = true
        },
        handleClick(tab, event) {
            console.log(tab, event)
        },
        handleLoginClose() {
            done()
        },
        handleClose(done) {
            done();
        }
    }
})
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?7d100c0973614817f55306a81da71486";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
