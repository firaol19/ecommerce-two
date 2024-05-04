function moveRight(){
    let btn1 = document.getElementById("mover");
    let icon = document.getElementById("display-btn")
    btn1.style.left = "0";
    icon.style.display = "none";
}

function moveLeft(){
    let btn2 = document.getElementById("mover");
    btn2.style.left = "-300px";
    let icon = document.getElementById("display-btn");
    icon.style.display = "block";

}

/*#################### navigation to category ############*/

const tabs = document.querySelectorAll('.tab_btn');
tabContents = document.querySelectorAll('[content]');

            

tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        tabContents.forEach((tabContent) => {
            tabContent.classList.remove('active-tabs');
        });
        tabs.forEach((tab) => {
            tab.classList.remove('active-tab');
        });
        tab.classList.add('active-tab');
    });
});


const tab1 = document.getElementById('tab1');
const tab2 = document.getElementById('tab2');
const tab3 = document.getElementById('tab3');
const tab4 = document.getElementById('tab4');
const tab5 = document.getElementById('tab5');
const tab6 = document.getElementById('tab6');
const tab7 = document.getElementById('tab7');
const tab8 = document.getElementById('tab8');


function display() {
    let content1 = document.getElementById('men-cloth') ;
    content1.classList.add('active-tabs');
}
function display2() {
    let content1 = document.getElementById('women-cloth') ;
    content1.classList.add('active-tabs');
}
function display3() {
    let content1 = document.getElementById('women-t-shirt') ;
    content1.classList.add('active-tabs');
}
function display4() {
    let content1 = document.getElementById('men-t-shirt') ;
    content1.classList.add('active-tabs');
}
function display5() {
    let content1 = document.getElementById('women-hoody') ;
    content1.classList.add('active-tabs');
}
function display6() {
    let content1 = document.getElementById('children-cloth') ;
    content1.classList.add('active-tabs');
}
function display7() {
    let content1 = document.getElementById('dress') ;
    content1.classList.add('active-tabs');
}
function display8() {
    let content1 = document.getElementById('sport-cloth') ;
    content1.classList.add('active-tabs');
}


tab1.addEventListener('click', display);
tab2.addEventListener('click', display2)
tab3.addEventListener('click', display3)
tab4.addEventListener('click', display4)
tab5.addEventListener('click', display5)
tab6.addEventListener('click', display6)
tab7.addEventListener('click', display7)
tab8.addEventListener('click', display8)