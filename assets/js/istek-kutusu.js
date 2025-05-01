document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("input, textarea");
    const submitBtn = document.getElementById("nextButtonIstekKutusu");
    const backBtn = document.getElementById("backButtonIstekKutusu");

    function checkInputs() {
        let allFilled = Array.from(inputs).every(input => input.value.trim() !== "");

        if (allFilled) {
            submitBtn.classList.remove("disabled-link");
            submitBtn.classList.add("enabled-link");
        } else {
            submitBtn.classList.add("disabled-link");
            submitBtn.classList.remove("enabled-link");
        }
    }

    submitBtn.addEventListener('click', function () {
        const tab_one = document.querySelector('.tab-1');
        const tab_two = document.querySelector('.tab-2');

        if (tab_one) {
            tab_one.classList.add('disabled');
            submitBtn.classList.add('disabled');
            backBtn.classList.add('disabled');
            tab_two.classList.remove('disabled');
        }
    });

    inputs.forEach(input => {
        input.addEventListener("input", checkInputs);
    });

    checkInputs();
});

particlesJS("bg", {
    "particles": {
        "number": {
            "value": 90,
            "density": {
                "enable": true,
                "value_area": 315
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.5,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 0.1,
                "opacity_min": 0.2,
                "sync": false
            }
        },
        "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 1,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 0.2,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": false,
                "mode": "repulse"
            },
            "onclick": {
                "enable": false,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});

