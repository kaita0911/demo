<?php /* Smarty version 2.6.30, created on 2026-01-08 14:24:40
         compiled from ./footer.tpl */ ?>
<footer class="p-footer">
  <div class="container">
    <div class="p-footer-wrap">
      <div class="p-footer-col">
        <h2 class="p-footer-col__ttl"><?php echo $this->_tpl_vars['footer']['name']; ?>
</h2>

        <div class="item">
          <i class="fa-solid fa-location-dot"></i> Địa chỉ 1: <?php echo $this->_tpl_vars['footer']['address']; ?>

        </div>
        <div class="item">
          <i class="fa-solid fa-location-dot"></i> Địa chỉ 2: 1045 Nguyễn Trãi, Phường 14, Quận 5, TP.HCM
        </div>
        <div class="item">
          <i class="fa-solid fa-phone"></i> Hotline: <strong><?php echo $this->_tpl_vars['footer']['hotline']; ?>
</strong>
        </div>
        <div class="item">
          <i class="fa-solid fa-envelope"></i> Email: <?php echo $this->_tpl_vars['footer']['email']; ?>

        </div>

        <ul class="social">
          <?php if ($this->_tpl_vars['faceShare']['facebook']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['facebook']; ?>
"><i class="fa-brands fa-facebook-f"></i></a></li><?php endif; ?>
          <?php if ($this->_tpl_vars['faceShare']['printest']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['printest']; ?>
"><i class="fa-brands fa-pinterest"></i></a></li><?php endif; ?>
          <?php if ($this->_tpl_vars['faceShare']['instagram']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['instagram']; ?>
"><i class="fa-brands fa-instagram"></i></a></li><?php endif; ?>
          <?php if ($this->_tpl_vars['faceShare']['linkedin']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['linkedin']; ?>
"><i class="fa-brands fa-linkedin-in"></i></a></li><?php endif; ?>
          <?php if ($this->_tpl_vars['faceShare']['youtube']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['youtube']; ?>
"><i class="fa-brands fa-youtube"></i></a></li><?php endif; ?>
          <?php if ($this->_tpl_vars['faceShare']['tiktok']): ?><li><a href="<?php echo $this->_tpl_vars['faceShare']['tiktok']; ?>
"><i class="fa-brands fa-tiktok"></i></a></li><?php endif; ?>
        </ul>

      </div>
      <div class="p-footer-col --tt">
        <h2 class="p-footer-col__ttl">Thông tin hữu ích</h2>
        <div class="p-footer-lst">
          <?php $_from = $this->_tpl_vars['consulting']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>

          <a class="services-item hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
            <i class="fa-solid fa-caret-right"></i> <?php echo $this->_tpl_vars['item']['name_detail']; ?>

          </a>

          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>
      <div class="p-footer-col --fb">
        <h2 class="p-footer-col__ttl">Fanpage Facebook</h2>
        <div class="content-fb">
          <div class="fanpage">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v24.0&appId=APP_ID"></script>
            <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100050944003406&amp;ref=embed_page#" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/profile.php?id=100050944003406&amp;ref=embed_page#" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100050944003406&amp;ref=embed_page#">Tấn Phát Mobile</a></blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>
    <p class="copyright">© Bản quyền thuộc Tấn Phát Mobile</p>
  </div>
</footer>
<div id="cart-popup"></div>
<div id="c-loading" class="<?php if ($_SESSION['contact_success']): ?> hide<?php endif; ?>">
  <div id="orderLoading"><svg width="50" height="50" viewBox="0 0 50 50" role="status" aria-label="Đang tải">
      <circle cx="25" cy="25" r="20" fill="none" stroke="#e9eef6" stroke-width="4" />
      <g>
        <path d="M45 25a20 20 0 0 1-20 20" fill="none" stroke="#0b76ff" stroke-width="4" stroke-linecap="round" />
        <animateTransform attributeName="transform"
          type="rotate"
          from="0 25 25"
          to="360 25 25"
          dur="1s"
          repeatCount="indefinite" />
      </g>
    </svg>
  </div>
</div>
<a href="#" class="back-to-top" id="backToTop"><i class="fa-solid fa-angle-up"></i></a>
<div class="bg-overlay"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "social.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>