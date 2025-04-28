// scripts.js
document.addEventListener("DOMContentLoaded", () => {
  const userName = localStorage.getItem("user_name") || "مستخدم";
  const nameElement = document.getElementById("userName");
  if (nameElement) nameElement.innerText = userName;

  // تفعيل Dark Mode إذا موجود
  if (localStorage.getItem("dark_mode") === "true") {
    document.body.classList.add("dark-mode");
  }
});

// زر تغيير الوضع الليلي
function toggleDarkMode() {
  document.body.classList.toggle("dark-mode");
  localStorage.setItem("dark_mode", document.body.classList.contains("dark-mode"));
}

// تسجيل الخروج
function logout() {
  localStorage.clear();
  window.location.href = "index.html";
}

// فتح الشات
function openChat() {
  Swal.fire('سيتم توجيهك للطبيب الآن!', '', 'info');
}

// الرجوع للخلف
function goBack() {
  window.history.back();
}
