<?php /* Smarty version 2.6.30, created on 2026-02-06 10:52:11
         compiled from products/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'products/detail.tpl', 9, false),array('modifier', 'round', 'products/detail.tpl', 48, false),array('function', 'math', 'products/detail.tpl', 47, false),)), $this); ?>
<main>
  <div class="container">
    <ul class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
    <!-- Main content -->
    <div class="artseed-body">
      <div class="product-detail">
        <div class="product-detail__left">

          <?php if (count($this->_tpl_vars['product_images']) > 0): ?>
          <div class="product-gallery">
            <div class="slider-for">
              <?php $_from = $this->_tpl_vars['product_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['item']):
?>
              <a class="image-main" data-color-code="<?php echo $this->_tpl_vars['item']['color_code']; ?>
" data-index="<?php echo $this->_tpl_vars['k']; ?>
" data-fancybox="gallery" href="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
">
                <img src="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
?width=350&height=350&mode=contain" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-scale" loading="lazy">
              </a>
              <?php endforeach; endif; unset($_from); ?>
            </div>
            <div class="slider-nav">
              <?php $_from = $this->_tpl_vars['product_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['item']):
?>
              <div class="image-item" data-color-code="<?php echo $this->_tpl_vars['item']['color_code']; ?>
" data-index="<?php echo $this->_tpl_vars['k']; ?>
">
                <img src="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
?width=140&height=140&mode=contain" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-scale" loading="lazy">
              </div>
              <?php endforeach; endif; unset($_from); ?>
            </div>
          </div>
          <?php else: ?>
          <div class="image-detail">
            <img src="/<?php echo $this->_tpl_vars['detail']['img_thumb_vn']; ?>
?width=400&height=400&mode=scale" title="<?php echo $this->_tpl_vars['detail']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['detail']['name_detail']; ?>
" class="img-scale" loading="lazy">
          </div>
          <?php endif; ?>
        </div>
        <div class="product-detail__meta" id="product-sidebar">
          <h1 class="ttl01" itemprop="headline"><?php echo $this->_tpl_vars['detail']['name']; ?>
</h1>


          <?php if (empty ( $this->_tpl_vars['product_codes'] )): ?>
          <div class="product-price --detail">
            <?php if ($this->_tpl_vars['detail']['price'] > 0): ?>
            <span class="price-current"><?php echo $this->_tpl_vars['detail']['price_formatted']; ?>
 ₫</span>
            <?php else: ?>
            <span class="price-current">Liên hệ</span>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['detail']['priceold'] > 0): ?>
            <span class="price-old"><?php echo $this->_tpl_vars['detail']['priceold_formatted']; ?>
 ₫</span>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['detail']['price'] > 0 && $this->_tpl_vars['detail']['priceold'] > 0 && $this->_tpl_vars['detail']['priceold'] > $this->_tpl_vars['detail']['price']): ?>
            <?php echo smarty_function_math(array('equation' => "(a - b) / a * 100",'a' => $this->_tpl_vars['detail']['priceold'],'b' => $this->_tpl_vars['detail']['price'],'assign' => 'discount'), $this);?>

            <span class="discount --detail">-<?php echo ((is_array($_tmp=$this->_tpl_vars['discount'])) ? $this->_run_mod_handler('round', true, $_tmp, 0) : round($_tmp, 0)); ?>
%</span>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if (! empty ( $this->_tpl_vars['product_codes'] )): ?>
          <div class="product-variants">
                        <div class="product-price-codes" id="product-price">
              <?php $this->assign('firstPrice', $this->_tpl_vars['product_codes'][0]['variants'][0]['price_formatted']); ?>
              <?php echo $this->_tpl_vars['firstPrice']; ?>


            </div>

                        <div class="product-variants-color">Màu sắc</div>
            <?php $_from = $this->_tpl_vars['product_codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['codeContent'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['codeContent']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['code']):
        $this->_foreach['codeContent']['iteration']++;
?>
            <div class="variant-box <?php if (! ($this->_foreach['codeContent']['iteration'] <= 1)): ?>hidden<?php endif; ?>"
              data-code-id="<?php echo $this->_tpl_vars['code']['id']; ?>
">
              <div class="color-list">
                <?php $_from = $this->_tpl_vars['code']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colorLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colorLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['colorLoop']['iteration']++;
?>
                <div
                  class="color-item <?php if (($this->_foreach['colorLoop']['iteration'] <= 1)): ?>active<?php endif; ?>"
                  data-price="<?php echo $this->_tpl_vars['v']['price']; ?>
"
                  data-price-formatted="<?php echo $this->_tpl_vars['v']['price_formatted']; ?>
"
                  data-color-code="<?php echo $this->_tpl_vars['v']['color_code']; ?>
">
                  <span class="color-dot" style="background:<?php echo $this->_tpl_vars['v']['color_code']; ?>
"></span>
                  <?php echo $this->_tpl_vars['v']['color_name']; ?>

                </div>
                <?php endforeach; endif; unset($_from); ?>
              </div>

            </div>
            <?php endforeach; endif; unset($_from); ?>
                        <div class="product-variants-color">Mã sản phẩm</div>
            <div class="code-tabs">
              <?php $_from = $this->_tpl_vars['product_codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['codeLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['codeLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['code']):
        $this->_foreach['codeLoop']['iteration']++;
?>
              <button
                class="code-tab <?php if (($this->_foreach['codeLoop']['iteration'] <= 1)): ?>active<?php endif; ?>"
                data-code-id="<?php echo $this->_tpl_vars['code']['id']; ?>
">
                <?php echo $this->_tpl_vars['code']['code']; ?>

              </button>
              <?php endforeach; endif; unset($_from); ?>
            </div>
          </div>
          <?php endif; ?>

          <div class="p-commit">
            <?php $_from = $this->_tpl_vars['commit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="commit-item">
              <div class="commit-item__img">
                <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">

              </div>
              <div class="commit-item__meta">
                <h3><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>
                <?php echo $this->_tpl_vars['item']['short']; ?>

              </div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
          </div>
          <form id="product-order-form">
            <input type="hidden" name="product_id" value="<?php echo $this->_tpl_vars['detail']['articlelist_id']; ?>
">
            <!-- <?php if (count($this->_tpl_vars['colors']) > 0): ?>
            <div class="box-colors box-attribute">
              <label class="box-attribute__ttl">Màu sắc <span id="color-name"></span></label>
              <div class="box-attribute__lst">
                <?php $_from = $this->_tpl_vars['colors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <label class="box-attribute__lst__item">
                  <input type="radio" name="colorids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-name="<?php echo $this->_tpl_vars['item']['name']; ?>
">
                  <span class="cuz-att"><span class="bg-color" style="background:<?php echo $this->_tpl_vars['item']['code']; ?>
"></span></span>
                </label>
                <?php endforeach; endif; unset($_from); ?>
              </div>
            </div>
            <?php endif; ?> -->
            <!-- <?php if (count($this->_tpl_vars['sizes']) > 0): ?>
            <div class="box-sizes box-attribute">
              <label class="box-attribute__ttl">Kích thước <span id="size-name"></span></label>
              <div class="box-attribute__lst">
                <?php $_from = $this->_tpl_vars['sizes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <label class="box-attribute__lst__item">
                  <input type="radio" name="sizeids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-name="<?php echo $this->_tpl_vars['item']['name']; ?>
">
                  <span class="cuz-att"><span class="bg-color"><?php echo $this->_tpl_vars['item']['name']; ?>
</span></span>
                </label>
                <?php endforeach; endif; unset($_from); ?>
              </div>
            </div>
            <?php endif; ?> -->
            <div class="box-order">
              <div class="c-quantity">
                <button type="button" class="c-quantity-btn minus">−</button>
                <input type="number" name="quantity" value="1" min="1">
                <button type="button" class="c-quantity-btn plus">+</button>
              </div>
              <div class="product-detail__buttons">
                <button type="button" class="btn-cart btn-add-cart" data-id="<?php echo $this->_tpl_vars['detail']['articlelist_id']; ?>
">Thêm vào giỏ <i class="ic_cart"></i></button>
                <button type="button" class="btn-cart btn-buy-now hide" data-id="<?php echo $this->_tpl_vars['detail']['articlelist_id']; ?>
">Mua nhanh</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="product-detail-flex">
        <div class="artseed-detail product-detail-des" itemprop="articleBody">
          <div class="artseed-detail__ttl">Chi tiết sản phẩm</div>
          <?php if (count($this->_tpl_vars['toc']) > 0): ?>
          <div class="detail-toc">
            <div class="detail-toc__ttl">Mục lục bài viết</div>
            <ul class="toc-content">
              <?php $_from = $this->_tpl_vars['toc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
              <li style="margin-left:<?php echo smarty_function_math(array('equation' => " (x - 2) * 20",'x' => $this->_tpl_vars['item']['level']), $this);?>
px;">
                <a href="#<?php echo $this->_tpl_vars['item']['id']; ?>
" class="hover">
                  <?php echo $this->_tpl_vars['item']['title']; ?>

                </a>
              </li>
              <?php endforeach; endif; unset($_from); ?>
            </ul>
          </div>
          <?php endif; ?>
          <?php echo $this->_tpl_vars['content']; ?>

          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'tag.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div class="product-detail-sidebar">
          <div class="artseed-detail__ttl">Thông số kỹ thuật</div>
          <?php echo $this->_tpl_vars['detail']['short']; ?>

        </div>
      </div>
    </div>


    <?php if (count($this->_tpl_vars['articles_related']) > 0): ?>
    <div class="related-articles">
      <h2 class="ttl02">Sản phẩm liên quan</h2>
      <div class="p-products">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'products/other.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    </div>
    <?php endif; ?>


    <!-- /.artseed-ftn-body -->
  </div>
</main>