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
<div class="drawerBox">
    <el-collapse v-model="activeNames">
        <el-collapse-item title="明朝皇帝" name="1">
            <div>
                <!-- <el-timeline :reverse="reverse">
                    <el-timeline-item
                    v-for="(huangdi, index) in mingchao"
                    :key="index"
                    :timestamp="activity.date">
                    {{huangdi.name}}
                    </el-timeline-item>
                </el-timeline> -->
             </div>

             明太祖朱元璋-- 明惠帝朱允炆 -- 明成祖朱棣 -- 明仁宗朱高炽 -- 明宣宗朱瞻基 --  明英宗朱祁镇

明代宗朱祁钰 -- 明宪宗朱见深 -- 明孝宗朱佑樘 -- 明武宗朱厚照 -- 明世宗朱厚熜 -- 明穆宗朱载垕

明神宗朱翊钧 -- 明光宗朱常洛 -- 明熹宗朱由校 -- 明思宗朱由检
            </div>
        </el-collapse-item>
        <el-collapse-item title="元朝皇帝" name="2">
            <div></div>
        </el-collapse-item>
        <el-collapse-item title="宋朝皇帝" name="3">
            <div>宋太祖赵匡胤  --  宋太宗赵光义 --  宋真宗赵恒 --  宋仁宗赵祯 -- 宋英宗赵曙 --  宋神宗赵顼

宋哲宗赵煦  -- 宋徽宗赵佶 -- 宋钦宗赵桓  -- 宋高宗赵构 -- 宋孝宗赵昚 -- 宋光宗赵惇

宋宁宗赵扩  -- 宋理宗赵昀 -- 宋度宗赵禥  -- 宋恭帝赵隰 -- 宋端宗赵昰 -- 宋卫王赵昺</div>
        </el-collapse-item>
        <el-collapse-item title="唐朝皇帝" name="4">
            <div>唐高祖李渊  --  唐太宗李世民 --  唐高宗李治 --  唐中宗李显 -- 唐睿宗李旦 --  武则天

唐玄宗李隆基  -- 唐肃宗李亨 -- 唐代宗李豫  -- 唐德宗李适 -- 唐顺宗李诵 -- 唐宪宗李纯

唐穆宗李恒  -- 唐敬宗李湛 -- 唐文宗李昂  -- 唐武宗李炎 -- 唐宣宗李忱 -- 唐懿宗李漼

唐僖宗李儇  -- 唐昭宗李晔 -- 唐哀帝李柷</div>
        </el-collapse-item>
        <el-collapse-item title="隋朝皇帝" name="2">
            <div>隋文帝杨坚  --  隋炀帝杨广 --  隋恭帝杨侑 --  隋秦王杨浩 -- 隋世宗杨昭 --  隋越王杨侗</div>
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
            activeNames: ['1'],
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
