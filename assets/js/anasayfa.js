document.addEventListener('DOMContentLoaded', function () {
    const hakkimizda = document.querySelectorAll('.hakkimizda_nav')
    const nedenbiz = document.querySelectorAll('.nedenbiz_nav')
    const iletisim = document.querySelectorAll('.iletisim_nav')

    const targetHakkimizda = document.getElementById('targetHakkimizda');
    const targetNedenBiz = document.getElementById('targetNedenBiz');
    const targetIletisim = document.getElementById('targetIletisim');

    if (hakkimizda) {
        hakkimizda.forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                if (targetHakkimizda) {
                    scrollToHakkimizda();
                }
            });
        });
    }

    if (iletisim) {
        iletisim.forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                if (targetIletisim) {
                    scrollToIletisim();
                }
            });
        });
    }

    if (nedenbiz) {
        nedenbiz.forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                if (targetNedenBiz) {
                    scrollToNedenBiz();
                }
            });
        });
    }
});


function scrollToHakkimizda() {
    const targetHakkimizda = document.getElementById('targetHakkimizda');
    const hedefY = targetHakkimizda.offsetTop;
    const currentY = window.scrollY;
    const distance = hedefY - currentY;
    const duration = 600;
    let startTime;

    function animateScroll(timestamp) {
        if (!startTime) startTime = timestamp;
        const progress = timestamp - startTime;
        const percentage = Math.min(progress / duration, 1);

        window.scrollTo(0, currentY - 100 + distance * percentage);

        if (progress < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    requestAnimationFrame(animateScroll);
}

function scrollToNedenBiz() {
    const targetNedenBiz = document.getElementById('targetNedenBiz');
    const hedefY = targetNedenBiz.offsetTop;
    const currentY = window.scrollY;
    const distance = hedefY - currentY;
    const duration = 600;
    let startTime;

    function animateScroll(timestamp) {
        if (!startTime) startTime = timestamp;
        const progress = timestamp - startTime;
        const percentage = Math.min(progress / duration, 1);

        window.scrollTo(0, currentY - 100 + distance * percentage);

        if (progress < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    requestAnimationFrame(animateScroll);
}

function scrollToIletisim() {
    const targetIletisim = document.getElementById('targetIletisim');
    const hedefY = targetIletisim.offsetTop;
    const currentY = window.scrollY;
    const distance = hedefY - currentY;
    const duration = 600;
    let startTime;

    function animateScroll(timestamp) {
        if (!startTime) startTime = timestamp;
        const progress = timestamp - startTime;
        const percentage = Math.min(progress / duration, 1);

        window.scrollTo(0, currentY - 100 + distance * percentage);

        if (progress < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    requestAnimationFrame(animateScroll);
}
