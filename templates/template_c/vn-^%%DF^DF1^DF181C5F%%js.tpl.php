<?php /* Smarty version 2.6.30, created on 2026-02-12 09:23:58
         compiled from ./js.tpl */ ?>
<script>
  const PATH_URL = "<?php echo $this->_tpl_vars['path_url']; ?>
/";
  const langPrefix = "<?php echo $this->_tpl_vars['lang_prefix']; ?>
"; // "en/" hoặc ""
</script>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/wow.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<?php if ($this->_tpl_vars['searchengine']['open'] == 1): ?>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/search_engine.js"></script>
<?php endif; ?>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/script.js"></script>
<?php if ($this->_tpl_vars['showcart']['open'] == 1): ?>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/cart.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['quickview']['open'] == 1): ?>
<script src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/js/quickview.js"></script>
<?php endif; ?>