const createFormBtn = document.querySelector(".S_createFormnBtn");
const createForm = document.querySelector(".S_createForm");

createFormBtn.onclick = function () {
    createForm.classList.toggle("S_createForm-active");
}

const delFormBtn = document.querySelector(".S_delFormBtn");
const deleteForm = document.querySelector(".S_deleteForm");

delFormBtn.onclick = function () {
    deleteForm.classList.toggle("S_deleteForm-active");
}