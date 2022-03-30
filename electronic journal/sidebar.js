const sidebarBtn = document.querySelector(".menu-btn");
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content");


sidebarBtn.onclick = function () {
    sidebar.classList.toggle("sidebar-active");
    content.classList.toggle("content-active");
}
