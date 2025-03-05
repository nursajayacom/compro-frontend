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
// END SEARCH BAR


const popup = document.getElementById("popup");
const openPopupBtn = document.getElementById("openPopup");
const closePopupBtn = document.getElementById("closePopup");

openPopupBtn.addEventListener("click", () => {
    popup.classList.remove("hidden");
    setTimeout(() => {
        popup.classList.remove("translate-y-full", "opacity-0");
        popup.classList.add("translate-y-0", "opacity-100");
    }, 10);
});

closePopupBtn.addEventListener("click", () => {
    popup.classList.remove("translate-y-0", "opacity-100");
    popup.classList.add("translate-y-full", "opacity-0");
    setTimeout(() => {
        popup.classList.add("hidden");
    }, 300);
});
