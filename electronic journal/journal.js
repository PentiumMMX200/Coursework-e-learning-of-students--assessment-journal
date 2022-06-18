
const groupSelector = document.querySelectorAll('.selectFormGroup');
const subjectSelector = document.querySelector('.selectFormSub');

function groupVisible(event) {

    groupSelector.forEach(selector => {

        if (selector.getAttribute("name") == event.currentTarget.value) {

            selector.classList.remove("selectFormGroup-disable");
        } else {
            selector.classList.add("selectFormGroup-disable");
        }
    });


};
subjectSelector.addEventListener('change', groupVisible);


const marks = document.querySelectorAll('.poseshenieOcenki');
let markDate = []


function dateSelect(element) {


    if (!markDate.includes(element.dataset.date)) {
        markDate.push(element.dataset.date);
    }
}

marks.forEach(dateSelect);

markDate.sort;

markDate.forEach(htmlWrite);

function htmlWrite(getDate, index) {
    const splitRow = getDate.split("-");
    const innerContentDomDate = document.createTextNode(`${splitRow[1]}/${splitRow[2]}`);
    const getDateRow = document.querySelector('.dateRow');
    let domDate = document.createElement('div');
    domDate.style.gridColumn = `${index + 2}/${index + 3}`;
    domDate.appendChild(innerContentDomDate);
    getDateRow.appendChild(domDate);

};

function markSelectorColumn(mark) {


    let markColumn = markDate.findIndex(date => date === mark.dataset.date);
    mark.style.gridColumn = `${markColumn + 2}/${markColumn + 3}`;


};

marks.forEach(markSelectorColumn);

const idInput = document.querySelector('.hiddenIdInput');
const markInput = document.querySelector('.markInput');
const markSelect = document.querySelector('.markChange');

marks.forEach(mark => {
    mark.addEventListener("click", editForm);
});

function editForm(change) {
    idInput.value = change.currentTarget.dataset.id;
    markInput.value = change.currentTarget.dataset.mark;
    markSelect.value = change.currentTarget.dataset.mark;

};

const createFormBtn = document.querySelector(".createFormnBtn");
const createForm = document.querySelector(".createForm");

createFormBtn.onclick = function () {
    createForm.classList.toggle("createForm-active");
}


const predm = document.querySelector('.selectFormSub');
const subjectInput = document.querySelector('.subjectInput');

predm.addEventListener('change', getSub);

function getSub(change) {
    subjectInput.value = change.currentTarget.value;
}

const group = document.querySelector('.selectFormGroup');
const groupInput = document.querySelector('.groupInput');

group.addEventListener('change', getGrp);

function getGrp(change) {
    groupInput.value = change.currentTarget.value;
}