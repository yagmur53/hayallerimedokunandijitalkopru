var p1 = document.getElementById('gonulluSifre');
var p2 = document.getElementById('gonulluSifreTekrar');

function toggle1() {
    if (p1.type === 'password') {
        p1.type = 'text';
    } else {
        p1.type = 'password';
    }

}

function toggle2() {
    if (p2.type === 'password') {
        p2.type = 'text';
    } else {
        p2.type = 'password';
    }

}