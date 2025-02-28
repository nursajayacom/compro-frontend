// START MOBILE NAVIGATION
const mobileMenu = document.getElementById('mobileMenu');
const overlay = document.getElementById('overlay');
const toggleOpen = document.getElementById('toggleOpen');
const toggleClose = document.getElementById('toggleClose');

toggleOpen.addEventListener('click', () => {
    mobileMenu.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
});

toggleClose.addEventListener('click', closeMenu);
overlay.addEventListener('click', closeMenu);

function closeMenu() {
    mobileMenu.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}
// END MOBILE NAVIGATION

// START SEARCH BAR
const searchBtn = document.getElementById('searchBtn');
const searchBtnMobile = document.getElementById('searchBtnMobile');
const searchOverlay = document.getElementById('searchOverlay');
const closeSearch = document.getElementById('closeSearch');
const clearSearch = document.getElementById('clearSearch');
const inputField = searchOverlay.querySelector('input');

searchBtn.addEventListener('click', () => {
    searchOverlay.classList.remove('hidden');
    setTimeout(() => inputField.focus(), 100);
});

searchBtnMobile.addEventListener('click', () => {
    searchOverlay.classList.remove('hidden');
    setTimeout(() => inputField.focus(), 100);
});

closeSearch.addEventListener('click', () => {
    searchOverlay.classList.add('hidden');
});

clearSearch.addEventListener('click', () => {
    inputField.value = '';
    inputField.focus();
});
// END SEARCH BAR
