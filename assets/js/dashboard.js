const userSettings = document.querySelector('.user_settings');
const userPanel = document.querySelector('.user_panel');

if (userSettings && userPanel) {
    let timeout;
    userSettings.addEventListener('mouseenter', function () {
        clearTimeout(timeout);
        userPanel.classList.add('is-active');
    });

    userSettings.addEventListener('mouseleave', function (event) {
        timeout = setTimeout(() => {
            if (!userPanel.contains(event.relatedTarget)) {
                userPanel.classList.remove('is-active');
            }
        }, 100);
    });

    userPanel.addEventListener('mouseenter', function () {
        clearTimeout(timeout);
        userPanel.classList.add('is-active');
    });

    userPanel.addEventListener('mouseleave', function (event) {
        timeout = setTimeout(() => {
            if (!userSettings.contains(event.relatedTarget)) {
                userPanel.classList.remove('is-active');
            }
        }, 100);
    });
}
