const baseUrl = typeof PATH_URL !== "undefined" ? PATH_URL : "";
new WOW().init();
updateCartBadge();
function updateCartBadge() {
  $.ajax({
    url: baseUrl + "ajax/addtocart.php",
    type: "POST",
    data: { action: "getCount" },
    dataType: "json",
    success: function (res) {
      $("#num-cart").text(res.total_items || 0);
    },
  });
}

$(document).on("click", ".btn-buy-now", function (e) {
  e.preventDefault();
  const productId = $(this).data("id");
  const qty = $("#product-order-form input[name='quantity']").val() || 1;

  $.ajax({
    url: baseUrl + "ajax/addtocart.php",
    type: "POST",
    data: {
      id: productId,
      quantity: qty,
    },
    dataType: "json",
    success: function (res) {
      if (res.success) {
        // Thêm thành công → chuyển tới trang thanh toán
        window.location.href = baseUrl + "order";
      } else {
        alert(res.message || "Lỗi thêm sản phẩm.");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      alert("Không thể thêm sản phẩm.");
    },
  });
});
/////
// Event delegation cho tất cả nút thêm giỏ hàng
$(document).on("click", ".btn-add-cart", function (e) {
  e.preventDefault();
  const productId = $(this).data("id");
  const qty = $("#product-order-form input[name='quantity']").val() || 1;
  const colorIds = $("#product-order-form input[name='colorids[]']:checked")
    .map(function () {
      return $(this).val();
    })
    .get(); // trả về mảng
  const sizeIds = $("#product-order-form input[name='sizeids[]']:checked")
    .map(function () {
      return $(this).val();
    })
    .get(); // trả về mảng
  console.log(colorIds);
  $.ajax({
    url: baseUrl + "ajax/addtocart.php",
    type: "POST",
    data: {
      id: productId,
      quantity: qty,
      colorids: colorIds, // gửi mảng màu đã chọn
      sizeids: sizeIds, // gửi mảng màu đã chọn
    },
    dataType: "json",
    success: function (res) {
      if (res.success) {
        updateCartBadge();
        //alert(res.message || "tc.");
        $(".btn-add-cart[data-id='" + res.product.id + "']").attr(
          "data-key",
          res.product.key
        );
        showCartPopup(res.product); // 👉 gọi hàm tách riêng
      } else {
        alert(res.message || "Lỗi thêm sản phẩm.");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", status, error);
      alert("⚠️ Không thể gọi addtocart.php. Kiểm tra URL và server.");
    },
  });
});
// cart-popup.js
function showCartPopup(product) {
  let moreText = "";
  // Chỉ hiển thị khi có màu hoặc size
  if (product.color_name || product.size_name) {
    const colorText = product.color_name ? product.color_name : "";
    const sizeText = product.size_name ? product.size_name : "";
    // Nếu cả 2 đều có thì thêm dấu phẩy giữa chúng
    moreText =
      colorText && sizeText
        ? `${colorText}, ${sizeText}`
        : `${colorText}${sizeText}`;
  }
  const hasOldPrice = product.priceold && Number(product.priceold) > 0;
  const popup = `
            <div class="cart-popup-ttl">Đã thêm vào giỏ hàng<span class="ic-close">X</span></div>
            <div class="popup-cart">
             <div class="popup-cart__img"><img src="${product.image}" alt="${
    product.name
  }"></div>
              <div class="popup-cart__info">
                <div class="popup-cart__ttl"><a href="${
                  baseUrl + product.unique_key
                }">${product.name}</a></div>
               
                <div class="popup-cart__quality"><span>X${
                  product.quantity
                }</span> ${
    moreText ? `<div class="popup-cart__more">${moreText}</div>` : ""
  }</div>
                <div class="popup-cart__price"><span class="price-current">${
                  product.price
                }</span>
                ${
                  hasOldPrice
                    ? `<span class="price-old">${product.priceold}</span>`
                    : ""
                }
                </div>
                
            </div>
            </div>
              <a class="btn-view-cart" href="${
                baseUrl + "cart"
              }">Xem giỏ hàng</a>
              </div>
          `;
  $("#cart-popup").html(popup).fadeIn(200);
  setTimeout(() => $("#cart-popup").fadeOut(300), 5000);
}
// Click X đóng popup + clear timeout
$(document).on("click", ".ic-close", function () {
  // clearTimeout(cartPopupTimeout);
  $("#cart-popup").fadeOut(200);
});
////sap xep theo sort
const sortSelect = document.getElementById("sortSelect");
if (sortSelect) {
  sortSelect.addEventListener("change", function () {
    document.getElementById("filterForm").submit();
  });
}

////form dang ky
$("#registerForm").on("submit", function (e) {
  e.preventDefault();
  const form = $(this);
  let isValid = true;
  // Reset lỗi cũ
  form.find(".error-msg").text("");
  form.find("input, textarea").removeClass("input-error");

  const email = form.find('input[name="email"]').val().trim();
  const phone = form.find('input[name="phone"]').val().trim();
  // ===== Kiểm tra email =====
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "") {
    showError('input[name="email"]', "Vui lòng nhập email.");
    isValid = false;
  } else if (!emailRegex.test(email)) {
    showError('input[name="email"]', "Email không hợp lệ.");
    isValid = false;
  }

  // ===== Kiểm tra số điện thoại (VN) =====
  const phoneRegex = /^(0|\+84)(\d{9})$/;
  if (phone === "") {
    showError('input[name="phone"]', "Vui lòng nhập số điện thoại.");
    isValid = false;
  } else if (!phoneRegex.test(phone)) {
    showError('input[name="phone"]', "Số điện thoại không hợp lệ.");
    isValid = false;
  }
  if (!isValid) return;

  $("#c-loading").fadeIn(200);
  $.ajax({
    url: baseUrl + "ajax/register_form.php",
    type: "POST",
    data: form.serialize(),
    dataType: "json",
    success: function (res) {
      if (res.success) {
        $("#c-loading").fadeOut(200); // ẩn loading
        showPopup("✅ " + res.message, "success");
        $("#registerForm")[0].reset();
      } else {
        showPopup("⚠️ " + res.message, "error");
      }
    },
    error: function (xhr) {
      $("#c-loading").fadeOut(200);
      showPopup("❌ Lỗi máy chủ: " + xhr.statusText, "error");
    },
  });
});
////
$("#registerFormDetail").on("submit", function (e) {
  e.preventDefault();
  const form = $(this);
  let isValid = true;
  // Reset lỗi cũ
  form.find(".error-msg").text("");
  form.find("input, textarea").removeClass("input-error");

  const email = form.find('input[name="email"]').val().trim();
  const phone = form.find('input[name="phone"]').val().trim();
  // ===== Kiểm tra email =====
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "") {
    showError('input[name="email"]', "Vui lòng nhập email.");
    isValid = false;
  } else if (!emailRegex.test(email)) {
    showError('input[name="email"]', "Email không hợp lệ.");
    isValid = false;
  }

  // ===== Kiểm tra số điện thoại (VN) =====
  const phoneRegex = /^(0|\+84)(\d{9})$/;
  if (phone === "") {
    showError('input[name="phone"]', "Vui lòng nhập số điện thoại.");
    isValid = false;
  } else if (!phoneRegex.test(phone)) {
    showError('input[name="phone"]', "Số điện thoại không hợp lệ.");
    isValid = false;
  }
  if (!isValid) return;

  $("#c-loading").fadeIn(200);
  $.ajax({
    url: baseUrl + "ajax/register_form_detail.php",
    type: "POST",
    data: form.serialize(),
    dataType: "json",
    success: function (res) {
      if (res.success) {
        $("#c-loading").fadeOut(200); // ẩn loading
        showPopup("✅ " + res.message, "success");
        $("#registerFormDetail")[0].reset();
      } else {
        showPopup("⚠️ " + res.message, "error");
      }
    },
    error: function (xhr) {
      $("#c-loading").fadeOut(200);
      showPopup("❌ Lỗi máy chủ: " + xhr.statusText, "error");
    },
  });
});
// === Hàm hiển thị lỗi dưới input ===
function showError(selector, message) {
  const input = $(selector);
  input.addClass("input-error");
  input.next(".error-msg").text(message);
}
// ===== Chặn ký tự không phải số trong ô điện thoại =====
$('input[name="phone"]').on("keypress", function (e) {
  const char = String.fromCharCode(e.which);
  const val = $(this).val();

  // Chỉ cho phép nhập số, hoặc dấu + (chỉ ở đầu)
  if (!/[0-9]/.test(char) && !(char === "+" && val.length === 0)) {
    e.preventDefault();
  }
});
// --- Hàm hiển thị popup ---
function showPopup(message, type = "success") {
  const $popup = $("#popupMessage");
  const $text = $("#popupText");

  $text.html(message);
  $popup
    .removeClass("popup-success popup-error")
    .addClass(type === "success" ? "popup-success" : "popup-error")
    .fadeIn(200)
    .css("display", "flex"); // đảm bảo dùng flex để căn giữa

  // Tự động ẩn sau 3 giây
  setTimeout(() => {
    $popup.fadeOut(300);
  }, 30000000);
}

// --- Nút đóng thủ công ---
$("#popupClose").on("click", function () {
  $("#popupMessage").fadeOut(300);
  $(".register-form").removeClass("show");
  document.documentElement.classList.remove("stopscroll");
});
$(document).on("click", "#popupMessage", function (e) {
  if (!$(e.target).closest(".popup-content").length) {
    $("#popupMessage").fadeOut(300);
    $(".register-form").removeClass("show");
    document.documentElement.classList.remove("stopscroll");
  }
});

// Ghi đè jQuery event listener để thêm passive
jQuery.event.special.touchstart = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchstart", handle, { passive: true });
  },
};
jQuery.event.special.touchmove = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchmove", handle, { passive: true });
  },
};
////js////
$(".js-sale").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  speed: 500,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 992, // Dưới 992px → 3 item
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 2,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
  ],
});
$(".js-news").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  speed: 500,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1200, // Dưới 1200px → 4 item
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 992, // Dưới 992px → 3 item
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 1,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
  ],
});
/////////////
$(".js-mv").on("init", function (event, slick) {
  // Slide đầu tiên zoom ngay khi load
  $(".js-mv .slick-current").addClass("zooming");
});

$(".js-mv").on("afterChange", function (event, slick, current) {
  // Xóa tất cả zoom
  $(".js-mv .slick-slide").removeClass("zooming");

  // Thêm zoom cho slide hiện tại sau khi fade xong
  $(".js-mv .slick-current").addClass("zooming");
});
// Khởi tạo slider hình to và thumbnail
$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  speed: 10,
  //asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  arrows: false,
  dots: false,
  centerMode: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 6,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 6,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
  ],
});
$(".slider-nav").on("click", ".image-item", function () {
  var index = $(this).data("index");

  $(".slider-for").slick("slickGoTo", index, false);

  $(".image-item").removeClass("active");
  $(this).addClass("active");
});
// Khởi tạo fancybox cho ảnh phóng to
Fancybox.bind("[data-fancybox='gallery']", {
  Thumbs: {
    autoStart: true,
  },
});
$(".js-mv").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
  fade: true, // BẬT FADE
  cssEase: "ease-in-out",
});

$(".js-service").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
  responsive: [
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 1,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
    {
      breakpoint: 9999, // trên 768px → tắt Slick
      settings: "unslick",
    },
  ],
});
$(".js-product").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
  responsive: [
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 1,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
    {
      breakpoint: 9999, // trên 768px → tắt Slick
      settings: "unslick",
    },
  ],
});
$(".js-feedback").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
  responsive: [
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 1,
        dots: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
  ],
});
$(".js-value").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 800,
  autoplay: true,
  autoplaySpeed: 3500,
});
$(".js-partner").slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  speed: 500,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1200, // Dưới 1200px → 4 item
      settings: {
        slidesToShow: 5,
      },
    },
    {
      breakpoint: 992, // Dưới 992px → 3 item
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 768, // Dưới 768px → 2 item
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 480, // Dưới 480px → 1 item
      settings: {
        slidesToShow: 2,
        arrows: false,
        autoplay: true, // Bật tự chạy
        autoplaySpeed: 5000, // 5000ms = 5 giây
      },
    },
  ],
});

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".c-quantity").forEach(function (el) {
    const input = el.querySelector('input[type="number"]');
    const btnMinus = el.querySelector(".minus");
    const btnPlus = el.querySelector(".plus");

    // Nếu thiếu bất kỳ phần tử nào, bỏ qua
    if (!input || !btnMinus || !btnPlus) return;

    btnMinus.addEventListener("click", () => {
      const min = parseInt(input.min) || 1;
      const value = Math.max(parseInt(input.value) - 1, min);
      input.value = value;
      input.dispatchEvent(new Event("change"));
    });

    btnPlus.addEventListener("click", () => {
      input.value = parseInt(input.value) + 1;
      input.dispatchEvent(new Event("change"));
    });
  });
});
$(document).on("change", 'input[name="colorids[]"]', function () {
  const colorName = $(this).data("name"); // Lấy tên từ data-name
  $("#color-name").text(colorName); // Hiển thị ra ngoài
});
$(document).on("change", 'input[name="sizeids[]"]', function () {
  const sizeName = $(this).data("name"); // Lấy tên từ data-name
  $("#size-name").text(sizeName); // Hiển thị ra ngoài
});
$(window).on("resize load", function () {
  if ($(window).width() < 768) {
    $(".product-des").insertAfter(".product-detail__meta");
  } else {
    $(".product-des").appendTo(".product-detail__left");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.getElementById("menu-toggle");
  const mobileMenu = document.getElementById("mobile-menu");
  if (menuToggle) {
    // Click hamburger -> mở/đóng menu
    menuToggle.addEventListener("click", function (e) {
      e.stopPropagation();
      mobileMenu.classList.toggle("open");
      document.documentElement.classList.add("noscroll");
    });
  }
  if (mobileMenu) {
    // Click bên ngoài menu -> đóng menu
    document.addEventListener("click", function () {
      mobileMenu.classList.remove("open");

      // Đóng tất cả submenu
      mobileMenu
        .querySelectorAll("ul ul")
        .forEach((ul) => ul.classList.remove("show"));
      mobileMenu
        .querySelectorAll(".fa-caret-down")
        .forEach((icon) => icon.classList.remove("rotated"));
      document.documentElement.classList.remove("noscroll");
    });

    // Ngăn click trong menu không đóng menu
    mobileMenu.addEventListener("click", function (e) {
      e.stopPropagation();
    });
    mobileMenu.querySelectorAll(".has-sub > .fa-angle-down").forEach((icon) => {
      icon.addEventListener("click", function (e) {
        e.stopPropagation(); // Ngăn click lan lên cấp cha

        const $submenu = $(this).siblings("ul");

        // Đóng tất cả các submenu anh em cùng cấp
        $(this).parent().siblings(".has-sub").find("ul").slideUp(200);
        $(this)
          .parent()
          .siblings(".has-sub")
          .find(".fa-angle-down")
          .removeClass("rotated");

        // Toggle submenu hiện tại
        $submenu.slideToggle(200);
        $(this).toggleClass("rotated");
      });
    });
  }
});
///Toc///
window.onload = function () {
  // --- Toggle mục lục ---
  $(".detail-toc__ttl").click(function () {
    $(this).toggleClass("active");
    $(".toc-content").stop(true, true).slideToggle(200); // 200ms = tốc độ trượt
  });
  var tocLinks = document.querySelectorAll(".toc-content a");
  for (var i = 0; i < tocLinks.length; i++) {
    tocLinks[i].onclick = function (e) {
      e.preventDefault();
      var target = document.querySelector(this.getAttribute("href"));
      if (target) {
        window.scrollTo({
          top: target.offsetTop,
          behavior: "smooth",
        });
      }
    };
  }
};

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    const popup = document.querySelector(".register-form");
    if (popup) {
      popup.classList.add("show");
      document.documentElement.classList.add("stopscroll"); // <html>
    }
  }, 60000);
  const popup = document.querySelector(".register-form");
  const popupWrap = document.querySelector(".register-form-wrap");
  const closeBtn = document.querySelector(".register-form-close");
  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      document.documentElement.classList.remove("stopscroll");
      document.querySelector(".register-form").classList.remove("show");
    });
  }
  if (popup) {
    popup.addEventListener("click", function (e) {
      if (!popupWrap.contains(e.target)) {
        popup.classList.remove("show");
        document.documentElement.classList.remove("stopscroll");
      }
    });
  }
});
///backtotop
const backToTop = document.getElementById("backToTop");
if (backToTop) {
  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      backToTop.classList.add("show");
    } else {
      backToTop.classList.remove("show");
    }
  });

  backToTop.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

///load more ajax

$("#loadMore").click(function () {
  let btn = $(this);
  let nextPage = parseInt(btn.attr("data-page")) + 1;

  $.ajax({
    url: window.location.pathname,
    type: "GET",
    data: { page: nextPage, ajax: 1 },
    success: function (res) {
      // res đã chỉ chứa .product-item
      let newItems = $(res).filter(".ajax-item");

      // nếu server bọc trong <div> thì dùng thêm:
      if (!newItems.length) {
        newItems = $(res).find(".ajax-item");
      }

      $(".wrap-ajax").append(newItems);

      newItems.css({ opacity: 0, transform: "translateY(20px)" });
      newItems.each(function (i, el) {
        setTimeout(() => {
          $(el).css({
            opacity: 1,
            transform: "translateY(0)",
            transition: "all 0.4s ease",
          });
        }, i * 50);
      });

      let totalLoaded = $(".wrap-ajax .ajax-item").length;
      let total = parseInt(btn.data("total"));
      btn.attr("data-page", nextPage);

      if (totalLoaded >= total) btn.fadeOut();
    },
  });
});

$(".ic_search").click(function () {
  $(".box-search-content").slideToggle();
});

// click "Xem chi tiết" -> mở popup
$(".view-set-detail").on("click", function () {
  $("#pwError").text("");
  $("#articlePassword").val("");
  $("#passwordModal").fadeIn(200);
});

// click nền mờ -> đóng popup
$("#passwordModal").on("click", function () {
  $(this).fadeOut(200);
});

// click trong box -> không đóng
$(".pw-box").on("click", function (e) {
  e.stopPropagation();
});

// click xác nhận mật khẩu
$("#btnCheckPassword").on("click", function () {
  var password = $("#articlePassword").val();
  var articleId = $("#article_id").val();

  if (!password) {
    $("#pwError").text("Vui lòng nhập mật khẩu");
    return;
  }

  $.post(
    baseUrl + "ajax/article_password_check.php",
    {
      article_id: articleId,
      password: password,
    },
    function (res) {
      if (!res.success) {
        $("#pwError").text("❌ Sai mật khẩu");
        return;
      }

      // đúng mật khẩu
      $("#passwordModal").fadeOut(200);
      $("#articleContent").fadeIn(200);
    },
    "json"
  );
});

// const btnCheckPassword = document.getElementById("btnCheckPassword");

// if (btnCheckPassword) {
//   btnCheckPassword.addEventListener("click", function () {
//     let password = document.getElementById("articlePassword").value;
//     let articleId = document.getElementById("article_id").value;

//     if (!password) {
//       document.getElementById("pwError").innerText = "Vui lòng nhập mật khẩu";
//       return;
//     }

//     fetch(baseUrl + "ajax/article_password_check.php", {
//       method: "POST",
//       headers: { "Content-Type": "application/x-www-form-urlencoded" },
//       body:
//         "article_id=" +
//         encodeURIComponent(articleId) +
//         "&password=" +
//         encodeURIComponent(password),
//     })
//       .then((r) => r.json())
//       .then((res) => {
//         if (!res.success) {
//           document.getElementById("pwError").innerText = "❌ Sai mật khẩu";
//           return;
//         }

//         document.getElementById("passwordModal").remove();
//         document.getElementById("articleContent").style.display = "block";
//       });
//   });
// }
////search////
document.addEventListener("DOMContentLoaded", function () {
  const inputs = document.querySelectorAll(".search-input");
  if (!inputs.length) return;

  const texts = [
    "Tìm kiếm sản phẩm",
    "iPhone chính hãng",
    "Samsung giá tốt",
    "Phụ kiện điện thoại",
  ];

  let textIndex = 0;
  let charIndex = 0;
  let isDeleting = false;

  function typeEffect() {
    inputs.forEach((input) => {
      if (input.value !== "") return; // đang nhập thì không chạy

      const currentText = texts[textIndex];

      if (!isDeleting) {
        input.placeholder = currentText.substring(0, charIndex + 1);
        charIndex++;
      } else {
        input.placeholder = currentText.substring(0, charIndex - 1);
        charIndex--;
      }
    });

    // xử lý chuyển trạng thái
    if (!isDeleting && charIndex === texts[textIndex].length) {
      setTimeout(() => (isDeleting = true), 1000);
    }

    if (isDeleting && charIndex === 0) {
      isDeleting = false;
      textIndex = (textIndex + 1) % texts.length;
    }

    setTimeout(typeEffect, isDeleting ? 70 : 110);
  }

  typeEffect();
});

///menushow
document.addEventListener("DOMContentLoaded", function () {
  var menu = document.querySelector(".navbar"); // class menu cha

  if (!menu) return;

  menu.addEventListener("mouseenter", function () {
    document.body.classList.add("menu-show");
  });

  menu.addEventListener("mouseleave", function () {
    document.body.classList.remove("menu-show");
  });
});

/////
var header = document.getElementById("c-header");
if (header && window.innerWidth > 768) {
  window.addEventListener("scroll", function () {
    if (window.scrollY > 50) {
      header.classList.add("fixed");
    } else {
      header.classList.remove("fixed");
    }
  });
}
////tab giá sản phẩm

document.addEventListener("DOMContentLoaded", function () {
  var codeTabs = document.querySelectorAll(".code-tab");
  var variantBoxes = document.querySelectorAll(".variant-box");
  var priceBox = document.getElementById("product-price");

  // CLICK TAB MÃ
  codeTabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      var codeId = this.dataset.codeId;

      // active tab
      codeTabs.forEach((t) => t.classList.remove("active"));
      this.classList.add("active");

      // show đúng box màu
      variantBoxes.forEach((box) => {
        box.classList.toggle("hidden", box.dataset.codeId !== codeId);
      });

      // auto chọn màu đầu tiên
      var activeBox = document.querySelector(
        '.variant-box[data-code-id="' + codeId + '"]'
      );
      var firstColor = activeBox.querySelector(".color-item");

      if (firstColor) {
        selectColor(firstColor);
      }
    });
  });

  // CLICK MÀU
  document.querySelectorAll(".color-item").forEach(function (item) {
    item.addEventListener("click", function () {
      selectColor(this);
    });
  });

  function selectColor(colorItem) {
    var parent = colorItem.closest(".variant-box");

    parent
      .querySelectorAll(".color-item")
      .forEach((i) => i.classList.remove("active"));

    colorItem.classList.add("active");

    // đổi giá
    priceBox.innerHTML = colorItem.dataset.priceFormatted;
  }
  ////đổi hình slick
  $(".color-item").on("click", function () {
    var colorCode = $(this).data("color-code");

    $(".color-item").removeClass("active");
    $(this).addClass("active");

    // 1️⃣ Ẩn / hiện ảnh theo màu (KHÔNG filter)
    $(".image-main").each(function () {
      $(this).toggleClass(
        "is-hidden",
        $(this).data("color-code") !== colorCode
      );
    });

    $(".image-item").each(function () {
      $(this).toggleClass(
        "is-hidden",
        $(this).data("color-code") !== colorCode
      );
    });

    // 2️⃣ tìm index ảnh đầu tiên của màu
    // 2️⃣ tìm ảnh đầu tiên của màu đó
    var firstIndex = null;

    $(".image-main").each(function () {
      if (!$(this).hasClass("is-hidden") && firstIndex === null) {
        firstIndex = $(this).data("index");
      }
    });

    if (firstIndex === null) return;

    // 3️⃣ slider-for đổi ảnh
    $(".slider-for").slick("slickGoTo", firstIndex, false);

    // 4️⃣ ⭐ SET ACTIVE CHO NAV (QUAN TRỌNG)
    $(".image-item").removeClass("active");
    $(".image-item").removeClass("slick-current");

    $(".image-item").each(function () {
      if ($(this).data("index") == firstIndex) {
        $(this).addClass("active");
      }
    });

    // ❌ TUYỆT ĐỐI KHÔNG slickGoTo slider-nav
  });
});
function activeGalleryByColor(colorCode) {
  if (!colorCode) return;

  const code = colorCode.toLowerCase();

  // tìm ảnh đầu tiên của màu đó
  const $target = $(
    '.slider-for .image-main[data-color-code="' + code + '"]'
  ).first();
  if (!$target.length) return;

  const index = $target.data("slick-index");

  // đổi ảnh lớn
  $(".slider-for").slick("slickGoTo", index, false);

  // active thumbnail
  $(".slider-nav .image-item").removeClass("slick-current");
  $('.slider-nav .image-item[data-color-code="' + code + '"]')
    .first()
    .addClass("slick-current");
}

$(window).on("load", function () {
  const activeColor =
    document.querySelector(".color-item.active")?.dataset.colorCode;

  if (activeColor) {
    activeGalleryByColor(activeColor);
  }
});

