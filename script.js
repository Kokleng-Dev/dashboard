const menuToggle = document.querySelector('.menuToggle');
const navigation = document.querySelector('.navigation');
const list = document.querySelectorAll('.list');
const dropDown = document.querySelectorAll('.dropDown');
const showDropDown = document.querySelectorAll('.show-drop-down');


menuToggle.onclick = function(){
    navigation.classList.toggle('open');
}

function activeLink(){
    list.forEach((item) => item.classList.remove('active'));
    dropDown.forEach((item) => item.classList.remove('activeDropDown'));
    showDropDown.forEach((item) => item.classList.remove('active'));
    this.classList.add('active');
}
function activeDropDown(){
    if(this.classList.contains('activeDropDown'))
    {
        this.classList.remove('activeDropDown');
    }
    else
    {
        dropDown.forEach((item) => item.classList.remove('activeDropDown'));
        this.classList.add('activeDropDown');
    }
}
function activeShowDropDown(){
    list.forEach((item) => item.classList.remove('active'));
    showDropDown.forEach((item) => item.classList.remove('active'));
    dropDown.forEach((item) => item.classList.toggle('activeDropDown'));

    this.classList.add('active');
}

list.forEach((item) => item.addEventListener('click',activeLink));
dropDown.forEach((item) => item.addEventListener('click',activeDropDown));
showDropDown.forEach((item) =>item.addEventListener('click',activeShowDropDown));