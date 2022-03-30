
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


}
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

const editFrom = document.querySelector('.editForm');
function editForm() {

}

