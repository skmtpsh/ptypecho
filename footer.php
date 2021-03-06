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
  title="柚米小百科"
  :visible.sync="drawerBaike"
  :direction="direction"
  :before-close="handleBaikeClose"
  size="80%"
>
    <el-collapse v-model="activeNames" @change="handleChange">
        <el-collapse-item title="明朝皇帝" name="1">
            <div>与现实生活一致：与现实生活的流程、逻辑保持一致，遵循用户习惯的语言和概念；</div>
        </el-collapse-item>
        <el-collapse-item title="元朝皇帝" name="2">
            <div>控制反馈：通过界面样式和交互动效让用户可以清晰的感知自己的操作；</div>
            <div>页面反馈：操作后，通过页面元素的变化清晰地展现当前状态。</div>
        </el-collapse-item>
        <el-collapse-item title="宋朝皇帝" name="3">
            <div>简化流程：设计简洁直观的操作流程；</div>
            <div>清晰明确：语言表达清晰且表意明确，让用户快速理解进而作出决策；</div>
            <div>帮助用户识别：界面简单直白，让用户快速识别而非回忆，减少用户记忆负担。</div>
        </el-collapse-item>
        <el-collapse-item title="唐朝皇帝" name="4">
            <div>用户决策：根据场景可给予用户操作建议或安全提示，但不能代替用户进行决策；</div>
            <div>结果可控：用户可以自由的进行操作，包括撤销、回退和终止当前操作等。</div>
        </el-collapse-item>
    </el-collapse>
</el-drawer>
<el-drawer
  title=""
  :visible.sync="drawer"
  :direction="direction"
  :before-close="handleClose"
  size="80%"
>
<h3># 在线服务</h3>
<ul class="modle-list">
    <li>
        <a href="http://gushi.pangshuhai.com" rel="noreferrer noopener" target="_blank">
            <i class="el-icon-collection"></i>
            <strong>部编版小学古诗词</strong>
            <span><em>111首</em> <i class="el-icon-arrow-right"></i></span>
        </a>
        </li>
        <li>
        <a href="http://yuedu.pangshuhai.com" rel="noreferrer noopener" target="_blank">
            <i class="el-icon-collection"></i>
            <strong>在线阅读书籍</strong>
            <span><em>去读读</em> <i class="el-icon-arrow-right"></i></span>
        </a>
    </li>
</ul>
</el-drawer>
<el-dialog
  title="用户登录"
  :visible.sync="dialogLoginVisible"
  width="40%"
  :before-close="handleLoginClose"
  custom-class="customDialog"
>
<!-- <form action="<php $this->options->loginAction()>" method="post" name="login" id="login" rold="form">
    <input type="hidden" name="referer" value="<php $this->options->siteUrl(); >">
    <input type="text" name="name" autocomplete="username" placeholder="请输入用户名" required/>
    <input type="password" name="password" autocomplete="current-password" placeholder="请输入密码" required/>
    <button type="submit">登录</button>
</form> -->
<div class="dialogCont" style="background: #fff; padding: 20px;">
    <el-form :model="ruleForm" :rules="rules" label-width="80px" ref="ruleForm" label-position="top">
    <el-form-item label="用户名" prop="name">
        <el-input v-model="ruleForm.name" placeholder="请输入用户名"></el-input>
    </el-form-item>
    <el-form-item label="密码" prop="password">
        <el-input type="password" v-model="ruleForm.password" placeholder="请输入密码" autocomplete="off"></el-input>
    </el-form-item>

    <el-button type="primary" @click="submitForm('ruleForm')">立即登录</el-button>

    </el-form>
</div>
</el-dialog>
<?php $this->footer(); ?>
</div>

<script>
var app = new Vue({
    el: '#app',
    data: function() {
        return {
            drawerBaike: false,
            activeName: 'all',
            drawer: false,
            direction: 'rtl',
            dialogLoginVisible: false,

            ruleForm: {
                name: '',
                password: '',
                referer: '<?php $this->options->siteUrl(); ?>'
            },
            rules: {
                name: [
                    { required: true, message: '请输入用户名', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' }
                ]
            }
        }
    },
    methods: {
        handleBaike() {
            this.drawerBaike = true
        },
        handleLogin() {
            this.dialogLoginVisible = true
        },
        submitForm() {
            this.$refs['ruleForm'].validate((valid) => {
                if (valid) {
                    var data = `name=${this.ruleForm.name}&password=${this.ruleForm.password}&referer=${this.ruleForm.referer}`
                    $.ajax({
                        type: "POST",//方法类型
                        dataType: "json",//预期服务器返回的数据类型
                        url: "<?php $this->options->loginAction() ?>" ,//url
                        data,
                        success: (result) => {

                        },
                        error: () => {

                        },
                        complete: () => {
                            window.location.reload()
                        }
                    });
                } else {

                }
            })
        },
        handleClick(tab, event) {
            console.log(tab, event)
        },
        handleBaikeClose(done) {
            done();
        },
        handleLoginClose(done) {
            done();
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
