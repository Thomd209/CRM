const btn = document.querySelector('.header__burger');
const menu = document.querySelector('.main-nav');
btn.addEventListener('click', () => {
    menu.classList.toggle('main-nav-open');
});