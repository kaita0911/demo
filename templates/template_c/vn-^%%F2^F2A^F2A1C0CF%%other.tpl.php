<?php /* Smarty version 2.6.30, created on 2026-01-19 08:34:57
         compiled from products/other.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'products/other.tpl', 4, false),array('modifier', 'round', 'products/other.tpl', 5, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['articles_related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="product-item">
  <?php if ($this->_tpl_vars['item']['price'] > 0 && $this->_tpl_vars['item']['priceold'] > 0 && $this->_tpl_vars['item']['priceold'] > $this->_tpl_vars['item']['price']): ?>
  <?php echo smarty_function_math(array('equation' => "(a - b) / a * 100",'a' => $this->_tpl_vars['item']['priceold'],'b' => $this->_tpl_vars['item']['price'],'assign' => 'discount'), $this);?>

  <span class="discount">-<?php echo ((is_array($_tmp=$this->_tpl_vars['discount'])) ? $this->_run_mod_handler('round', true, $_tmp, 0) : round($_tmp, 0)); ?>
%</span>
  <?php endif; ?>
  <a class="product-item__img hover-img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['link_detail']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
    <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="img-cover">
  </a>
  <h3><a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['link_detail']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
  <div class="product-price">
    <span class="price-current"><?php echo $this->_tpl_vars['item']['price_formatted']; ?>
</span>
    <?php if ($this->_tpl_vars['item']['priceold'] > 0): ?>
    <span class="price-old"><?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>
</span>
    <?php endif; ?>
  </div>
</div>
<?php endforeach; endif; unset($_from); ?>