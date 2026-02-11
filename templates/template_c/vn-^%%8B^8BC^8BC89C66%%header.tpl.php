<?php /* Smarty version 2.6.30, created on 2026-02-11 15:38:38
         compiled from ./header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './header.tpl', 23, false),array('modifier', 'count', './header.tpl', 28, false),)), $this); ?>
<header class="p-header">
  <div class="head-mv">
    <div class="container"><img src="/assets/images/head-mv.jpg" class="" alt="Hỗ trợ"></div>
  </div>

  <div class="header-top" id="c-header">
    <div class="container">
      <div class="header-top-wrap">
        <div id="menu-toggle" class="sp"><i class="fa-solid fa-list"></i></div>
        <a class="logo" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
" title="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
          <img src="/<?php echo $this->_tpl_vars['logoHome']['img_thumb_vn']; ?>
" class="img-responsive" alt="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
        </a>
        <div class="navbar">
          <div class="navbar-toggler pc">Danh mục</div>
          <div class="navbar-collapse" id="mobile-menu">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'categories_tree.tpl', 'smarty_include_vars' => array('categories' => $this->_tpl_vars['categories_tree'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </div>
        </div>
        <!-- <div class="menu menu_mb" id="mobile-menu">
          <nav class="menutop">
            <ul>
              <li>
                <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['home'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['home'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

                </a>
              </li>
              <?php $_from = $this->_tpl_vars['menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
              <li class="<?php if (count($this->_tpl_vars['menu']['categories']) > 0): ?>has-sub<?php endif; ?>">
                <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['menu']['unique_key_detail']; ?>
"><?php echo $this->_tpl_vars['menu']['name_detail']; ?>
</a>
                <?php if ($this->_tpl_vars['menu']['has_sub'] == 1): ?>
                <?php if (count($this->_tpl_vars['menu']['categories']) > 0): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'categories_tree.tpl', 'smarty_include_vars' => array('categories' => $this->_tpl_vars['menu']['categories'],'level' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <i class="fa-solid fa-angle-down"></i>
                <?php endif; ?>
                <?php endif; ?>
              </li>
              <?php endforeach; endif; unset($_from); ?>
            </ul>
          </nav>

        </div> -->

        <div class="box-search">
          <!-- <span class="ic_search sp"><i class="fa-solid fa-magnifying-glass"></i></span> -->
          <div class="box-search-content">
            <?php if ($this->_tpl_vars['searchengine']['open'] == 1): ?>
            <input class="input-search" type="text" id="search-keyword" placeholder="Nhập từ khóa..." autocomplete="off">
            <div id="suggestions"></div>
            <i class="fa-solid fa-magnifying-glass"></i>
            <?php else: ?>
            <form action="" method="get" onsubmit="return goSearch(this)">
              <input class="search-input" type="text" name="keyword" id="keyword" placeholder="" required>
              <span class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></span>
            </form>
            <?php echo '
            <script>
              function goSearch(f) {
                const k = f.keyword.value.trim();
                if (!k) return false;
                window.location.href = \'/tim-kiem/\' + encodeURIComponent(k);
                return false;
              }
            </script>'; ?>

            <?php endif; ?>
          </div>
        </div>
        <?php if (count($this->_tpl_vars['alllanguages']) > 1): ?>
        <div class="lang-switch">
          <?php $_from = $this->_tpl_vars['alllanguages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
          <a class="ic-lang" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['item']['code']; ?>
" class="">
            <img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/<?php echo $this->_tpl_vars['item']['code']; ?>
.png" alt="vi">
          </a>
          <?php endforeach; endif; unset($_from); ?>
        </div>
        <?php endif; ?>

        <div class="header-ck pc">
          <i class="fa-solid fa-award"></i>

          <div class="header-ck-co">
            <span>100%</span> Hàng chính hãng
          </div>
        </div>
        <div class="header-hotline pc">
          <i class="fa-solid fa-phone-volume"></i>
          <div class="header-hotline-co">
            <span>Hotline</span> <?php echo $this->_tpl_vars['hotline']['phone']; ?>

          </div>
        </div>
        <?php if ($this->_tpl_vars['quickview']['open'] == 1): ?>
        <a class="wishlist-icon" href="<?php echo $this->_tpl_vars['path_url']; ?>
/wishlist/">
          <i class="fa-regular fa-heart"></i>
          <span id="wishlist-count"><?php echo $this->_tpl_vars['wishlist_total']; ?>
</span>
        </a>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['showcart']['open'] == 1): ?>
        <a class="header-cart" href="<?php echo $this->_tpl_vars['path_url']; ?>
/cart/" class="cart-popover btn" title="Shopping Cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <span id="num-cart">0</span>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="bg-nav-menu">
    <div class="container">
      <div class="nav-menu">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'categories_tree_2.tpl', 'smarty_include_vars' => array('categories' => $this->_tpl_vars['categories_tree'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    </div>
  </div>
</header>