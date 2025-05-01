// Giriş işlemi
function handleLoginSubmit(event) {
    event.preventDefault();  // Sayfa yenilenmesini engelle

    var email = document.getElementById('loginEmail').value;
    var password = document.getElementById('loginPassword').value;

    var formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('login', true);  // Login işlemi olduğunu belirt

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login_signup_handler.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success(response.message);
                if (response.is_gonullu === 1) {
                    setTimeout(function () {
                        window.location.href = 'gonullu-paneli.php';
                    }, 1250);
                } else {
                    setTimeout(function () {
                        window.location.href = 'kullanici-paneli.php';
                    }, 1250);
                }
            } else {
                toastr.error(response.message);
            }
        }
    };

    xhr.send(formData);
}

// Kaydolma işlemi
function handleSignupSubmit(event) {
    event.preventDefault();  // Sayfa yenilenmesini engelle

    var adsoyad = document.getElementById('signupAdSoyad').value;
    var email = document.getElementById('signupEmail').value;
    var password = document.getElementById('signupPassword').value;
    var confirmPassword = document.getElementById('signupConfirmPassword').value;

    var formData = new FormData();
    formData.append('adsoyad', adsoyad);
    formData.append('email2', email);
    formData.append('password2', password);
    formData.append('confirm_password', confirmPassword);
    formData.append('signup', true);  // Signup işlemi olduğunu belirt

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login_signup_handler.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success(response.message);
                setTimeout(function () {
                    window.location.href = 'login.php'; // Yönlendirme
                }, 2000);
            } else {
                toastr.error(response.message);
            }
        }
    };

    xhr.send(formData);
}

// Gönüllü kaydolma işlemi
function handleSignupSubmit2(event) {
    event.preventDefault();

    var adsoyad = document.getElementById('gonulluAdSoyad').value;
    var email = document.getElementById('gonulluEmail').value;
    var password = document.getElementById('gonulluSifre').value;
    var confirmPassword = document.getElementById('gonulluSifreTekrar').value;

    var formData = new FormData();
    formData.append('adsoyad', adsoyad);
    formData.append('email2', email);
    formData.append('password2', password);
    formData.append('confirm_password', confirmPassword);
    formData.append('is_gonullu', 1);
    formData.append('signup', true);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login_signup_handler.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success(response.message);
                setTimeout(function () {
                    window.location.href = 'login.php';
                }, 2000);
            } else {
                toastr.error(response.message);
            }
        }
    };

    xhr.send(formData);
}

// Hayal Ekleme
function handleHayalSubmit(event) {
    event.preventDefault();

    var adsoyad = document.querySelector('[name="adsoyad"]').value;
    var sehir = document.querySelector('[name="sehir"]').value;
    var ilce = document.querySelector('[name="ilce"]').value;
    var adres = document.querySelector('[name="adres"]').value;
    var yetimhane = document.querySelector('[name="yetimhane"]').value;
    var hayal = document.getElementById("hayal").textContent;
    var userId = document.getElementById('hayalGonderForm').getAttribute('data-user-id');

    var formData = new FormData();
    formData.append('adsoyad', adsoyad);
    formData.append('sehir', sehir);
    formData.append('ilce', ilce);
    formData.append('adres', adres);
    formData.append('yetimhane', yetimhane);
    formData.append('hayal', hayal);
    formData.append('user_id', userId);
    formData.append('hayal_kaydet', true);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login_signup_handler.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success(response.message);
                setTimeout(function () {
                    window.location.href = 'kullanici-paneli.php';
                }, 2000);
            } else {
                toastr.error(response.message);
            }
        }
    };

    xhr.send(formData);
}


