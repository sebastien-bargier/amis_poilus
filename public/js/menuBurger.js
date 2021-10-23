const burger = document.querySelector('.burger');

burger.addEventListener('click', () =>{
    burger.classList.toggle('active');
});

const btn = document.querySelector('.burger');
const menu = document.querySelector('.menu');

btn.onclick = function (){
    menu.classList.toggle('menu_open');
}