function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../logout.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success('Çıkış işlemi başarılı!');
                setTimeout(function () {
                    window.location.href = '../index.php';
                }, 2000);
            } else {
                toastr.error('Çıkış yaparken bir hata oluştu.');
            }
        }
    };

    xhr.send('logout=true');
}

function logout2() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './logout.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                toastr.success('Çıkış işlemi başarılı!');
                setTimeout(function () {
                    window.location.href = './index.php';
                }, 2000);
            } else {
                toastr.error('Çıkış yaparken bir hata oluştu.');
            }
        }
    };

    xhr.send('logout=true');
}