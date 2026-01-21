<?php /* Smarty version 2.6.30, created on 2026-01-12 09:34:17
         compiled from social.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'social.tpl', 20, false),)), $this); ?>
<!-- Messenger -->
<!-- <a href="https://m.me/thegioithietbiphache/" class="support-ic sms-icon" rel="nofollow">
      <img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/ic_messenger.png" alt="Messenger">
   </a> -->

<!-- Zalo -->
<a href="http://zalo.me/0903949329" target="_blank" class="support-ic zalo" rel="nofollow">
   <img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/ic__zalo.png" alt="Zalo">
</a>

<!-- Call -->
<a href="tel:<?php echo $this->_tpl_vars['hotline']['phone']; ?>
" class="support-ic call-icon" rel="nofollow">
   <span><img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/telephone.png" alt="Call"></span>
</a>


<!-- Nội dung script từ CMS -->
<?php echo $this->_tpl_vars['bodyscript']['content_vn']; ?>

<script>
   var zalo_qr = "<?php echo ((is_array($_tmp=$this->_tpl_vars['hotline']['plain_text_vn'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
</script>
<?php echo '
<script>
   var zalo_acc = {
      "0903949329": zalo_qr
   };

   function devvnCheckLinkAvailability(link, successCallback, errorCallback) {
      var hiddenIframe = document.querySelector("#hiddenIframe");
      if (!hiddenIframe) {
         hiddenIframe = document.createElement("iframe");
         hiddenIframe.id = "hiddenIframe";
         hiddenIframe.style.display = "none";
         document.body.appendChild(hiddenIframe);
      }

      var timeout = setTimeout(function() {
         errorCallback("Link is not supported.");
         window.removeEventListener("blur", handleBlur);
      }, 2500);

      var result = {};

      function handleMouseMove(event) {
         if (!result.x) {
            result = {
               x: event.clientX,
               y: event.clientY
            };
         }
      }

      function handleBlur() {
         clearTimeout(timeout);
         window.addEventListener("mousemove", handleMouseMove);
      }

      window.addEventListener("blur", handleBlur);

      window.addEventListener("focus", function onFocus() {
         setTimeout(function() {
            if (document.hasFocus()) {
               successCallback(result);
            } else {
               successCallback("Link can be opened.");
            }

            window.removeEventListener("focus", onFocus);
            window.removeEventListener("blur", handleBlur);
            window.removeEventListener("mousemove", handleMouseMove);

         }, 500);
      }, {
         once: true
      });

      hiddenIframe.contentWindow.location.href = link;
   }

   // Xử lý click Zalo
   Object.keys(zalo_acc).forEach(function(sdt) {

      let qrcode = zalo_acc[sdt];
      const zaloLinks = document.querySelectorAll(\'a[href*="zalo.me/\' + sdt + \'"]\');

      zaloLinks.forEach(function(zalo) {
         zalo.addEventListener("click", function(event) {
            event.preventDefault();
            const ua = navigator.userAgent.toLowerCase();
            let redirectURL = null;

            if (/iphone|ipad|ipod/.test(ua)) {
               redirectURL = \'zalo://qr/p/\' + qrcode;
               window.location.href = redirectURL;
            } else if (/android/.test(ua)) {
               redirectURL = \'zalo://zaloapp.com/qr/p/\' + qrcode;
               window.location.href = redirectURL;
            } else {
               redirectURL = \'zalo://conversation?phone=\' + sdt;
               zalo.classList.add("zalo_loading");

               devvnCheckLinkAvailability(
                  redirectURL,
                  function() {
                     zalo.classList.remove("zalo_loading");
                  },
                  function() {
                     zalo.classList.remove("zalo_loading");
                     window.location.href = \'https://chat.zalo.me/?phone=\' + sdt;
                  }
               );
            }
         });
      });
   });

   // CSS loading
   var style = document.createElement("style");
   style.innerHTML = ".zalo_loading { pointer-events: none; }";
   document.head.appendChild(style);
</script>
'; ?>