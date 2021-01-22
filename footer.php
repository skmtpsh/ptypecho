<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <!-- <?php _e('柚米版权所有 '); ?>.  -->
    <a href="https://beian.miit.gov.cn/">鲁ICP备2021002545号</a>
</footer><!-- end #footer -->
<?php $this->footer(); ?>
</body>
</html>
