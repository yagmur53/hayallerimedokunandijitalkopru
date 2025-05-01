const profileCard = document.getElementById('profileCard');
let isProfileOpen = false;

function toggleProfile(event) {
    if (event) {
        event.stopPropagation();
    }
    isProfileOpen = !isProfileOpen;
    profileCard.classList.toggle('active', isProfileOpen);
}

document.addEventListener('click', (event) => {
    if (isProfileOpen && !profileCard.contains(event.target)) {
        toggleProfile();
    }
});