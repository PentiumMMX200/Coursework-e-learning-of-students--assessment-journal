const tabsSelector = Array.from(document.querySelectorAll('.tabsBtn'));
const tabs = Array.from(document.querySelectorAll('.tabs'));

function toggleTab(tabNum) {
    tabs.map((tab, _tabNum) => {
        if (tabNum === _tabNum) {
            tab.style.display = 'block';
            tabsSelector[_tabNum].classList.add('tabsBtn-active');
        } else {
            tab.style.display = 'none';
            tabsSelector[_tabNum].classList.remove('tabsBtn-active');
        }
    });
}

tabsSelector.map((tabSelector, tabNum) => {
    tabSelector.addEventListener('click', toggleTab.bind(this, tabNum));



});