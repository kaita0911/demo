<?php /* Smarty version 2.6.30, created on 2026-02-12 15:24:25
         compiled from popup.tpl */ ?>
<?php if ($this->_tpl_vars['formdangky']['open'] == 1): ?>
<div class="register-form">
   <div class="register-form-wrap">
      <div class="register-form__meta">
         <h3 class="register-form__ttl">Đăng ký nhận báo giá</h3>
         <p class="register-form__txt">Đơn vị thiết kế và thi công trên toàn quốc<br><span>(Đặt lịch để được tư vấn và nhận báo giá)</span></p>
         <form id="registerForm">
            <div class="form-group">
               <input type="text" name="fullname" placeholder="Họ tên" required />
            </div>
            <div class="form-group">
               <input type="text" name="phone" placeholder="Điện thoại" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <input type="email" name="email" placeholder="Email" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <input type="address" name="address" placeholder="Địa chỉ" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <textarea name="message" rows="3" placeholder="Thông tin dự án, diện tích, vị trí, phong cách" required></textarea>
            </div>
            <div class="register-form__btn"><button type="submit" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Đăng ký tư vấn</button></div>
         </form>
         <div id=" formMessage" class="msg-box">
         </div>
      </div>
      <span class="register-form-close">&times;</span>
   </div>
</div>
<!-- Popup thông báo -->
<!-- <div id="popupMessage" class="popup-message">
   <div class="popup-content">
      <span id="popupText"></span>
      <button id="popupClose">&times;</button>
   </div>
</div> -->

<div id="successPopup" class="success-popup">
    <div class="success-popup__box">
        <div class="success-icon">✓</div>
        <div class="success-text">Gửi thông tin thành công!</div>
    </div>
</div>
<?php endif; ?>