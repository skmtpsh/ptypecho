<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. 备案/许可证编号: 鲁ICP备2021002545</p>
    <p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.</p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
