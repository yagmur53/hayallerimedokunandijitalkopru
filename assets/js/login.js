var canvas;
var context;
var screenH;
var screenW;
var stars = [];
var fps = 50;
var numStars = 2000;

$('document').ready(function() {
  
  // Calculate the screen size
	screenH = $(window).height();
	screenW = $(window).width();
	
	// Get the canvas
	canvas = $('#space');
	
	// Fill out the canvas
	canvas.attr('height', screenH);
	canvas.attr('width', screenW);
	context = canvas[0].getContext('2d');
	
	// Create all the stars
	for(var i = 0; i < numStars; i++) {
		var x = Math.round(Math.random() * screenW);
		var y = Math.round(Math.random() * screenH);
		var length = 1 + Math.random() * 2;
		var opacity = Math.random();
		
		// Create a new star and draw
		var star = new Star(x, y, length, opacity);
		
		// Add the the stars array
		stars.push(star);
	}
	
	setInterval(animate, 1000 / fps);
});

/**
 * Animate the canvas
 */
function animate() {
	context.clearRect(0, 0, screenW, screenH);
	$.each(stars, function() {
		this.draw(context);
	})
}

/**
 * Star
 * 
 * @param int x
 * @param int y
 * @param int length
 * @param opacity
 */
function Star(x, y, length, opacity) {
	this.x = parseInt(x);
	this.y = parseInt(y);
	this.length = parseInt(length);
	this.opacity = opacity;
	this.factor = 1;
	this.increment = Math.random() * .03;
}

/**
 * Draw a star
 * 
 * This function draws a start.
 * You need to give the contaxt as a parameter 
 * 
 * @param context
 */
Star.prototype.draw = function() {
	context.rotate((Math.PI * 1 / 10));
	
	// Save the context
	context.save();
	
	// move into the middle of the canvas, just to make room
	context.translate(this.x, this.y);
	
	// Change the opacity
	if(this.opacity > 1) {
		this.factor = -1;
	}
	else if(this.opacity <= 0) {
		this.factor = 1;
		
		this.x = Math.round(Math.random() * screenW);
		this.y = Math.round(Math.random() * screenH);
	}
		
	this.opacity += this.increment * this.factor;
	
	context.beginPath()
	for (var i = 5; i--;) {
		context.lineTo(0, this.length);
		context.translate(0, this.length);
		context.rotate((Math.PI * 2 / 10));
		context.lineTo(0, - this.length);
		context.translate(0, - this.length);
		context.rotate(-(Math.PI * 6 / 10));
	}
	context.lineTo(0, this.length);
	context.closePath();
	context.fillStyle = "rgba(255, 255, 200, " + this.opacity + ")";
	context.shadowBlur = 5;
	context.shadowColor = '#ffff33';
	context.fill();
	
	context.restore();
}

// DOM-Elemente auswählen
const loginBtn = document.getElementById('loginBtn');
const signupBtn = document.getElementById('signupBtn');
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');
const slider = document.querySelector('.slider');

// Funktion zum Wechseln zwischen Login- und Signup-Formularen
function switchForm(activeForm, inactiveForm, activeBtn, inactiveBtn, isSignup) {
    activeBtn.classList.add('active');
    inactiveBtn.classList.remove('active');
    
    // Slider-Animation
    gsap.to(slider, {
        x: isSignup ? '100%' : '0%',
        duration: 0.3,
        ease: "power2.inOut"
    });
    
    // Formular-Wechsel-Animation
    gsap.to(activeForm, {
        opacity: 1,
        x: 0,
        duration: 0.5,
        ease: "power2.out",
        display: 'block'
    });
    
    gsap.to(inactiveForm, {
        opacity: 0,
        x: isSignup ? '-100%' : '100%',
        duration: 0.5,
        ease: "power2.out",
        display: 'none'
    });
}

loginBtn.addEventListener('click', () => switchForm(loginForm, signupForm, loginBtn, signupBtn, false));
signupBtn.addEventListener('click', () => switchForm(signupForm, loginForm, signupBtn, loginBtn, true));

document.querySelectorAll('.input-group input').forEach(input => {
    input.addEventListener('focus', () => {
        gsap.to(input.nextElementSibling, {
            top: -20,
            fontSize: 12,
            duration: 0.3,
            ease: "power2.out"
        });
    });
    
    input.addEventListener('blur', () => {
        if (input.value === '') {
            gsap.to(input.nextElementSibling, {
                top: 0,
                fontSize: 16,
                duration: 0.3,
                ease: "power2.out"
            });
        }
    });
});

document.querySelectorAll('button').forEach(button => {
    button.addEventListener('mouseenter', () => {
        gsap.to(button, {
            scale: 1.05,
            duration: 0.3,
            ease: "power2.out"
        });
    });
    
    button.addEventListener('mouseleave', () => {
        gsap.to(button, {
            scale: 1,
            duration: 0.3,
            ease: "power2.out"
        });
    });
});