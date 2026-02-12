<?php /* Smarty version 2.6.30, created on 2026-02-12 11:10:10
         compiled from products/sub.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'products/sub.tpl', 22, false),)), $this); ?>
<main>
   <div class="container">
      <ul class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
      <div class="c-filter">
         <h1 class="ttl01"> <?php echo $this->_tpl_vars['c_ttl']; ?>
 <i class="icon-phone"></i>
         </h1>
         <?php if ($this->_tpl_vars['filter_product']['open'] == 1): ?>
         <div class="sort-wrapper">
            <select id="sort-product">
               <option value="">Sắp xếp</option>
               <option value="name_asc">Tên A - Z</option>
               <option value="name_desc">Tên Z - A</option>
               <option value="price_asc">Giá thấp - cao</option>
               <option value="price_desc">Giá cao - thấp</option>
            </select>
         </div>
         <?php endif; ?>
      </div>
      <?php if ($this->_tpl_vars['cateInfo']['content']): ?>
      <div class="cate-description"><?php echo $this->_tpl_vars['cateInfo']['content']; ?>
</div>
      <?php endif; ?>
      <?php if (count($this->_tpl_vars['view']) > 0): ?>
      <div id="product-list">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'products/list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
      <?php else: ?>
      <div class="no-product">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      <?php endif; ?>
   </div>
</main>