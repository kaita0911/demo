<?php /* Smarty version 2.6.30, created on 2026-02-11 15:05:21
         compiled from ./wishlist/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', './wishlist/list.tpl', 8, false),)), $this); ?>

<main class="p-wishlist">
   <div class="container">
      <div class="c-filter">
         <h1 class="ttl01">Danh sách yêu thích</h1>
      </div>
      
      <?php if (count($this->_tpl_vars['wishlist']) > 0): ?>
      <div class="p-products">
      <?php $_from = $this->_tpl_vars['wishlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
      <div class="product-item">
            <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html">
            <img src="/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" loading="lazy">
            </a>

            <h3><?php echo $this->_tpl_vars['item']['name']; ?>
</h3>

            <div class="product-price">
            <span class="price-current"><?php echo $this->_tpl_vars['item']['price_formatted']; ?>
</span>
            <?php if ($this->_tpl_vars['item']['priceold'] > 0): ?>
               <span class="price-old"><?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>
</span>
            <?php endif; ?>
            </div>
            <div class="product-item-action">
            <div class="btn-wishlist
               <?php if (in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['wishlist_ids'] )): ?>active<?php endif; ?>"
               data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
"
               title="Thêm vào yêu thích">
               <i class="fa-regular fa-heart"></i>
            </div>
            </div>
            
         </div>
      <?php endforeach; endif; unset($_from); ?>
      </div>
      <?php else: ?>
      <p>Chưa có sản phẩm nào trong wishlist ❤️</p>
      <?php endif; ?>
   </div>
   <br>
</main>