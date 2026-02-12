////wishlish
function updateWishlistCount(total) {
    const el = document.getElementById("wishlist-count");
    if (!el) return;
    el.textContent = total;
  }
  
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-wishlist");
    if (!btn) return;
  
    const id = btn.dataset.id;
    const isActive = btn.classList.contains("active");
  
    fetch("/ajax/wishlist.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `product_id=${id}&action=${isActive ? "remove" : "add"}`
    })
      .then(res => res.json())
      .then(data => {
  
        // ===== Nếu đang ở trang wishlist =====
        if (document.querySelector(".p-wishlist")) {
  
          if (isActive) {
            showToast("Đã xoá khỏi danh sách ưa thích !", "remove");
            const productItem = btn.closest(".product-item");
  
            if (productItem) {
              productItem.style.transition = "0.3s";
              productItem.style.opacity = "0";
  
              setTimeout(() => {
                productItem.remove();
  
                // Nếu không còn sản phẩm nào
                if (!document.querySelector(".product-item")) {
                  document.querySelector(".p-products").innerHTML =
                    "<p>Chưa có sản phẩm nào trong wishlist !</p>";
                }
  
              }, 300);
            }
          }
  
        } else {
          showToast("Đã thêm vào danh sách ưa thích !", "success");
          // ===== Trang khác → chỉ toggle active =====
          btn.classList.toggle("active");
        }
  
        // Update số lượng header
        const countEl = document.getElementById("wishlist-count");
        if (countEl) countEl.textContent = data.total;
  
        // Đổi icon tim
        const icon = btn.querySelector("i");
        if (icon) {
          if (btn.classList.contains("active")) {
            icon.classList.remove("fa-regular");
            icon.classList.add("fa-solid");
          } else {
            icon.classList.remove("fa-solid");
            icon.classList.add("fa-regular");
          }
        }
  
      });
  });
  
  function toggleWishlistIcon(btn, active) {
    const icon = btn.querySelector("i");
    if (!icon) return;
  
    if (active) {
      icon.classList.remove("fa-regular");
      icon.classList.add("fa-solid");
    } else {
      icon.classList.remove("fa-solid");
      icon.classList.add("fa-regular");
    }
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-wishlist.active").forEach(btn => {
      toggleWishlistIcon(btn, true);
    });
  });
  
  function showToast(message, type = "success") {
    const container = document.getElementById("wishlist-toast");
    if (!container) return;
  
    const toast = document.createElement("div");
    toast.className = "toast-item toast-" + type;
    toast.textContent = message;
  
    container.appendChild(toast);
  
    // animation
    setTimeout(() => toast.classList.add("show"), 10);
  
    // tự ẩn sau 2.5s
    setTimeout(() => {
      toast.classList.remove("show");
      setTimeout(() => toast.remove(), 300);
    }, 2500);
  }
  ///quickview

const modal = document.getElementById("quickview-modal");
const modalBody = document.getElementById("quickview-body");

let scrollPosition = 0;

document.addEventListener("click", function (e) {

  const btn = e.target.closest(".btn-quickview");
  if (btn) {

    const id = btn.dataset.id;

    fetch("/ajax/quickview.php?id=" + id)
      .then(res => res.text())
      .then(html => {

        modalBody.innerHTML = html;
        modal.classList.add("active");

        // ✅ Lưu vị trí scroll
        scrollPosition = window.pageYOffset;

        // ✅ Khóa scroll nhưng giữ nguyên vị trí
        document.body.style.position = "fixed";
        document.body.style.top = `-${scrollPosition}px`;
        document.body.style.width = "100%";

        const content = modal.querySelector(".quickview-content");
        content.setAttribute("tabindex", "-1");
        content.focus();
      });
  }

  if (e.target.classList.contains("quickview-overlay") ||
      e.target.classList.contains("quickview-close")) {
    closeQuickView();
  }

});

// ESC đóng popup
document.addEventListener("keydown", function(e){
  if (e.key === "Escape") {
    closeQuickView();
  }
});

function closeQuickView() {

  modal.classList.remove("active");

  // ✅ Mở lại scroll đúng vị trí
  document.body.style.position = "";
  document.body.style.top = "";
  document.body.style.width = "";

  window.scrollTo(0, scrollPosition);
}
