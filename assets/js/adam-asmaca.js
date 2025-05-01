window.onload = function () {

    var alphabet = ['a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'ğ', 'h',
        'ı', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'r', 's',
        'ş', 't', 'u', 'v', 'v', 'y', 'z'];

    var categories;         // Array of topics
    var chosenCategory;     // Selected catagory
    var getHint;          // Word getHint
    var word;              // Selected word
    var guess;             // Geuss
    var geusses = [];      // Stored geusses
    var lives;             // Lives
    var counter;           // Count correct geusses
    var space;              // Number of spaces in word '-'

    // Get elements
    var showLives = document.getElementById("game_mylives");
    var showCatagory = document.getElementById("game_catagory");
    var getHint = document.getElementById("game_hint");
    var showClue = document.getElementById("game_clue");

    // create alphabet ul
    var buttons = function () {
        myButtons = document.getElementById('game_buttons');
        letters = document.createElement('ul');

        for (var i = 0; i < alphabet.length; i++) {
            letters.id = 'game_alphabet';
            list = document.createElement('li');
            list.id = 'game_letter';
            letterspan = document.createElement('span');
            letterspan.id = 'game_letterspan';
            letterspan.innerHTML = alphabet[i];
            check();
            myButtons.appendChild(letters);
            letters.appendChild(list);
            list.appendChild(letterspan);
        }
    }

    // Select Catagory
    var selectCat = function () {
        if (chosenCategory === categories[0]) {
            game_catagoryName.innerHTML = "Seçilen Kategori: Hayvan";
        } else if (chosenCategory === categories[1]) {
            game_catagoryName.innerHTML = "Seçilen Kategori: Futbol Takımı";
        } else if (chosenCategory === categories[2]) {
            game_catagoryName.innerHTML = "Seçilen Kategori: Şehir";
        }
    }

    // Create geusses ul
    result = function () {
        wordHolder = document.getElementById('game_hold');
        correct = document.createElement('ul');

        for (var i = 0; i < word.length; i++) {
            correct.setAttribute('id', 'game_my-word');
            guess = document.createElement('li');
            guess.setAttribute('class', 'game_guess');
            if (word[i] === "-") {
                guess.innerHTML = "-";
                space = 1;
            } else {
                guess.innerHTML = "_";
            }

            geusses.push(guess);
            wordHolder.appendChild(correct);
            correct.appendChild(guess);
        }
    }

    // Show lives
    comments = function () {
        showLives.innerHTML = "Kalan Yanlış Kelime Hakkın : " + lives;
        if (lives < 1) {
            showLives.innerHTML = "Maalesef Oyunu Kaybettin :(";
            var allLetters = document.querySelectorAll('#game_letter');
            allLetters.forEach(function (letter) {
                letter.classList.add('game_active');
                letter.onclick = null;
            });
        }
        for (var i = 0; i < geusses.length; i++) {
            if (counter + space === geusses.length) {
                showLives.innerHTML = "Oyunu Kazandın! TEBRİKLERRR";
                allLetters.forEach(function (letter) {
                    letter.classList.add('game_active');
                    letter.onclick = null;
                });
            }
        }
    }

    // Animate man
    var animate = function () {
        var drawMe = lives;
        drawArray[drawMe]();
    }

    // Hangman
    canvas = function () {
        myStickman = document.getElementById("game_stickman");
        context = myStickman.getContext('2d');
        context.beginPath();
        context.strokeStyle = "#000";
        context.lineWidth = 2;
    };

    head = function () {
        myStickman = document.getElementById("game_stickman");
        context = myStickman.getContext('2d');
        context.beginPath();
        context.arc(60, 25, 10, 0, Math.PI * 2, true);
        context.stroke();
    }

    draw = function ($pathFromx, $pathFromy, $pathTox, $pathToy) {
        context.moveTo($pathFromx, $pathFromy);
        context.lineTo($pathTox, $pathToy);
        context.stroke();
    }

    frame1 = function () {
        draw(0, 150, 150, 150);
    };

    frame2 = function () {
        draw(10, 0, 10, 600);
    };

    frame3 = function () {
        draw(0, 5, 70, 5);
    };

    frame4 = function () {
        draw(60, 5, 60, 15);
    };

    torso = function () {
        draw(60, 36, 60, 70);
    };

    rightArm = function () {
        draw(60, 46, 100, 50);
    };

    leftArm = function () {
        draw(60, 46, 20, 50);
    };

    rightLeg = function () {
        draw(60, 70, 100, 100);
    };

    leftLeg = function () {
        draw(60, 70, 20, 100);
    };

    drawArray = [rightLeg, leftLeg, rightArm, leftArm, torso, head, frame4, frame3, frame2, frame1];

    // OnClick Function
    check = function () {
        list.onclick = function () {
            var geuss = (this.querySelector('span').innerHTML);
            this.setAttribute("class", "game_active");
            this.onclick = null;
            for (var i = 0; i < word.length; i++) {
                if (word[i] === geuss) {
                    geusses[i].innerHTML = geuss;
                    counter += 1;
                }
            }
            var j = (word.indexOf(geuss));
            if (j === -1) {
                lives -= 1;
                comments();
                animate();
            } else {
                comments();
            }
        }
    }

    // Play
    play = function () {
        categories = [
            ["aslan", "kedi", "fil", "kuş", "ayı", "kaplan", "kanguru", "balina", "zebra", "maymun"],
            ["trabzonspor", "beşiktaş", "fenerbahçe", "galatasaray", "başakşehir", "alanyaspor", "sivasspor", "konyaspor", "göztepe", "rizespor"],
            ["rize", "trabzon", "istanbul", "adana", "antalya", "izmir", "bursa", "konya", "gaziantep", "samsun", "eskisehir", "kayseri", "denizli", "mersin", "tekirdağ", "bodrum", "sivas", "diyarbakır", "muğla", "kocaeli"]
        ];

        chosenCategory = categories[Math.floor(Math.random() * categories.length)];
        word = chosenCategory[Math.floor(Math.random() * chosenCategory.length)];
        word = word.replace(/\s/g, "-");
        buttons();

        geusses = [];
        lives = 10;
        counter = 0;
        space = 0;
        result();
        comments();
        selectCat();
        canvas();
    }

    play();

    // Hint
    game_hint.onclick = function () {
        hints = [
            ["Ormanların kralı", "Evde beslenen küçük tüy yumağı", "Büyük kulakları olan, uzun hortumlu", "Kanatlarıyla uçan canlı", "Büyük ve güçlü hayvan", "Çizgili orman yırtıcısı", "Çantalı kesesi olan hayvan", "Denizlerin devasa memelisi", "Beyaz ve siyah çizgili", "Muza bayılan hayvan"],
            ["Karadeniz şampiyonu", "Kartallar", "Sarı-lacivert", "Aslanlar", "İstanbul'un yükseleni", "Akdeniz'in gücü", "Kırmızı-beyaz", "Yeşil-beyaz", "İzmir'in sarısı", "Çay kenti"],
            ["Çayın merkezi", "Karadeniz'in yıldızı", "Boğazın incisi", "Seyhan nehri", "Turizmin başkenti", "Ege'nin incisi", "Fabrikaların şehri", "Mevlana'nın yeri", "Baklava şehri", "Liman şehri", "Porsuk Çayı", "Pastırma başkenti", "Pamukkale travertenleri", "Akdeniz'in incisi", "Trakya'nın kültürü", "Deniz turizmi", "Göller yöresi", "Kürt kültür merkezi", "Ege'nin tatları", "İstanbul'a yakın"]
        ];

        var catagoryIndex = categories.indexOf(chosenCategory);
        var hintIndex = chosenCategory.indexOf(word);
        showClue.innerHTML = "İpucu: - " + hints[catagoryIndex][hintIndex];
    };

    // Reset
    document.getElementById('game_reset').onclick = function () {
        correct.parentNode.removeChild(correct);
        letters.parentNode.removeChild(letters);
        showClue.innerHTML = "";
        context.clearRect(0, 0, 400, 400);
        play();
    }
}
