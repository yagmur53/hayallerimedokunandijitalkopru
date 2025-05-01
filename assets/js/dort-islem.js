let score = 0; // Doğru cevap sayacı
let wrongAnswers = 0; // Yanlış cevap sayacı

// Soru Üretme Fonksiyonu
function generateQuestion() {
    // Eğer yanlış cevap sayısı 10'u geçtiyse oyunu sonlandır
    if (wrongAnswers >= 10) {
        document.querySelector(".game-box").innerHTML = `
                                    <h1 style="color: #FF1493; text-align: center;">Oyun Bitti!</h1>
                                    <p style="text-align: center; font-size: 20px;">Skorunuz: ${score}</p>
                                `;
        return; // Oyun sona erdi
    }

    // Rastgele sayılar ve işlemi oluştur
    const num1 = Math.floor(Math.random() * 10) + 1;
    const num2 = Math.floor(Math.random() * 10) + 1;
    const operations = ["+", "-"];
    const operation = operations[Math.floor(Math.random() * operations.length)];

    const correctAnswer = operation === "+" ? num1 + num2 : num1 - num2;

    // Soruyu ekranda göster, soru işareti ekle ve altına siyah bir çizgi ekle
    document.getElementById("question").innerHTML = `
                                ${num1} ${operation} ${num2}?
                                <hr style="border: 1px solid black; margin-top: 10px;">
                            `;

    // Rastgele doğru cevabı bir butona yerleştir
    const randomButton = Math.random() > 0.5 ? "answer1" : "answer2";
    document.getElementById(randomButton).textContent = correctAnswer;
    document.getElementById(randomButton).dataset.correct = "true";

    // Yanlış cevabı diğer butona yerleştir
    const otherButton = randomButton === "answer1" ? "answer2" : "answer1";
    let wrongAnswer;
    do {
        wrongAnswer = correctAnswer + Math.floor(Math.random() * 10 - 5); // Yanlış ama mantıklı bir sonuç
    } while (wrongAnswer === correctAnswer); // Yanlış cevap doğru cevaba eşit olmamalı
    document.getElementById(otherButton).textContent = wrongAnswer;
    document.getElementById(otherButton).dataset.correct = "false";
}

// Cevap Kontrolü Fonksiyonu
function checkAnswer(buttonId) {
    const button = document.getElementById(buttonId);

    // Doğru ya da yanlış durumunu kontrol et
    if (button.dataset.correct === "true") {
        score++;
        button.classList.add("correct"); // Yeşil arka plan efekti
    } else {
        wrongAnswers++;
        button.classList.add("wrong"); // Kırmızı arka plan efekti
    }

    // Skoru ve yanlış cevapları güncelle
    document.getElementById("score").textContent = `Skor: ${score}`;
    document.getElementById("wrong").textContent = `Yanlış: ${wrongAnswers}`;

    // Bir saniyelik bekleme sonrası yeni soru
    setTimeout(() => {
        button.classList.remove("correct", "wrong");
        generateQuestion();
    }, 1000);
}

// Oyunu Sıfırlama Fonksiyonu
function resetGame() {
    score = 0; // Skoru sıfırla
    wrongAnswers = 0; // Yanlış cevapları sıfırla

    // Skor ve yanlış sayılarını sıfırla
    document.getElementById("score").textContent = `Skor: ${score}`;
    document.getElementById("wrong").textContent = `Yanlış: ${wrongAnswers}`;

    // Oyun kutusunu temizle ve yeni sorular üret
    document.querySelector(".game-box").innerHTML = `
                                <div class="question-box">
                                    <div id="question" class="question">Soru Yükleniyor...</div>
                                    <div class="answers">
                                        <button id="answer1" class="answer-button" onclick="checkAnswer('answer1')">Cevap 1</button>
                                        <button id="answer2" class="answer-button" onclick="checkAnswer('answer2')">Cevap 2</button>
                                    </div>
                                </div>
                            `;

    // Yeni bir soru oluştur
    generateQuestion();
}

// Oyunu Başlat
resetGame();

// Baloncuk Üretme Fonksiyonu
function createBubble() {
    const bubbleContainer = document.querySelector('.bubble-container');
    const bubble = document.createElement('div');
    bubble.classList.add('bubble');

    // Rastgele yatay pozisyon belirleme
    const randomPosition = Math.random() * window.innerWidth;
    bubble.style.left = `${randomPosition}px`;

    // Balonun konteynere eklenmesi
    bubbleContainer.appendChild(bubble);

    // Baloncuk animasyonu tamamlandığında kaldırma
    setTimeout(() => {
        bubble.remove();
    }, 8000); // Animasyon süresiyle uyumlu
}

// Baloncuk Üretimi İçin Döngü
setInterval(createBubble, 1000); // Her saniyede bir baloncuk eklenir