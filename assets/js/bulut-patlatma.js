const cloudContainer = document.getElementById('cloud-container');
const scoreElement = document.getElementById('score');
const timerElement = document.getElementById('timer');
const restartButton = document.getElementById('restart');
const gameOverElement = document.getElementById('game-over');
const endMessage = document.getElementById('end-message');

let score = 0;
let timeLeft = 30; // Başlangıçta kalan süre
let gameRunning = true;
let countdownTimer;

function createCloud() {
    if (!gameRunning) return;

    const cloud = document.createElement('div');
    cloud.classList.add('cloud');
    cloud.style.left = `${Math.random() * 350}px`;

    // Bulutu tıklama
    cloud.addEventListener('click', () => {
        if (gameRunning) {
            score++;
            scoreElement.textContent = score;
        }
        cloud.remove();
    });

    cloud.addEventListener('animationend', () => {
        cloud.remove();
    });

    cloudContainer.appendChild(cloud);

    // Yeni bulut üret
    if (gameRunning) {
        setTimeout(createCloud, Math.random() * 2000 + 500);
    }
}

function startGameTimer() {
    countdownTimer = setInterval(() => {
        if (timeLeft > 0) {
            timeLeft--;
            timerElement.textContent = timeLeft; // Kalan süreyi güncelle
        } else {
            clearInterval(countdownTimer); // Zamanlayıcıyı durdur
            gameRunning = false; // Oyunu durdur
            endMessage.textContent = `Tebrikler! Skorunuz: ${score}`; // Mesajı güncelle
            gameOverElement.classList.remove('hidden'); // Oyun bitti ekranını göster
        }
    }, 1000);
}

restartButton.addEventListener('click', () => {
    // Oyunu sıfırla
    score = 0;
    timeLeft = 30;
    gameRunning = true;
    scoreElement.textContent = score;
    timerElement.textContent = timeLeft;
    gameOverElement.classList.add('hidden'); // Oyun bitti ekranını gizle
    clearInterval(countdownTimer); // Mevcut zamanlayıcıyı sıfırla
    startGameTimer(); // Zamanlayıcıyı yeniden başlat
    createCloud(); // Yeni oyunu başlat
});

// Oyunu başlat
