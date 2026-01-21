<?php /* Smarty version 2.6.30, created on 2026-01-19 08:34:25
         compiled from main/main.tpl */ ?>
<main>
   <div class="container">
      <div class="wrap-top">
         <div class="p-mv js-mv">
            <?php $_from = $this->_tpl_vars['view_banner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="item">
               <img class="img" src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
" alt="<?php echo $this->_tpl_vars['item']['id']; ?>
" fetchpriority="high">
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
         <div class="col-bnr">
            <?php $_from = $this->_tpl_vars['view_partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="item">
               <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
" alt="<?php echo $this->_tpl_vars['item']['id']; ?>
" fetchpriority="high">
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div>
   <div class="p-product">
      <div class="container">
         <h2 class="ttl02 --sale">FLASH SALE - GIÁ SỐC MỖI NGÀY
         </h2>
         <div class="p-product-sale">
            <div class="js-sale">
               <?php $_from = $this->_tpl_vars['product_new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
               <div class="product-item">
                  <a class="product-item__img hover-img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                     <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
                  </a>
                  <h3><a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
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
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <?php $_from = $this->_tpl_vars['home_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
      <section class="home-category">
         <div class="home-category__head">
            <h2>
               <a class="ttl02" href="/<?php echo $this->_tpl_vars['cat']['unique_key']; ?>
">
                  <?php echo $this->_tpl_vars['cat']['name']; ?>

               </a>
            </h2>
            <div class="cate-sub">
               <?php if ($this->_tpl_vars['cat']['sub_categories']): ?>
               <ul>
                  <?php $_from = $this->_tpl_vars['cat']['sub_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
                  <li>
                     <a href="/<?php echo $this->_tpl_vars['sub']['unique_key']; ?>
">
                        <?php echo $this->_tpl_vars['sub']['name']; ?>

                     </a>
                  </li>
                  <?php endforeach; endif; unset($_from); ?>
               </ul>
               <?php endif; ?>
               <a class="view-all" href="/<?php echo $this->_tpl_vars['cat']['unique_key']; ?>
">Xem thêm</a>
            </div>
         </div>
         <div class="p-products">
            <?php $_from = $this->_tpl_vars['cat']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="product-item">
               <a class="product-item__img hover-img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                  <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
               </a>
               <h3><a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['itemath_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
               <div class="product-price">
                  <span class="price-current"><?php echo $this->_tpl_vars['item']['price_formatted']; ?>
</span>
                  <?php if ($this->_tpl_vars['item']['priceold_formatted']): ?>
                  <span class="price-old"><?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>
</span>
                  <?php endif; ?>
               </div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </section>
      <?php endforeach; endif; unset($_from); ?>
   </div>


   <!-- <div class="p-feedback">
      <div class="container">
         <h2 class="ttl02">Phản hồi khách hàng</h2>
         <div class="js-feedback">
            <?php $_from = $this->_tpl_vars['feedback']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="feedback-item">
               <div class="feedback-item__img">
                  <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=400&height=300&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
               </div>
               <div class="feedback-item__meta">
                  <div class="feedback-item__short"><?php echo $this->_tpl_vars['item']['short']; ?>
</div>
                  <h3 class="feedback-item__ttl">-- <span><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</span> --</h3>

               </div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div> -->
   <!-- <div class="p-news">
      <div class="container">
         <h2 class="ttl02">Tin tức</h2>
         <div class="p-news-wrap js-news">
            <?php $_from = $this->_tpl_vars['news_home']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="news-item">
               <a class="news-item__img hover-img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                  <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=800&height=600&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
               </a>
               <h3><a class="news-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
               <div class="news-item__short"><?php echo $this->_tpl_vars['item']['short']; ?>
</div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div> -->
   <!-- <div class="p-partner">
      <div class="container">
         <div class="js-partner">
            <?php $_from = $this->_tpl_vars['view_partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="item hover-img">
               <img src="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['id']; ?>
" class="img-scale" loading="lazy">
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div> -->
</main>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'popup.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>