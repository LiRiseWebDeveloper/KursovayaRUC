
function createHiddenNum(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}
console.log(createHiddenNum(0,100));

function welcome() {
    var button1 = document.getElementById('btn1');
    var button2 = document.getElementById('btn2');
    button1.style.display = 'none';
    button2.style.display = 'flex';
    button2.style.flexDirection = 'row';
    alert("Начинаем игру");
    alert1.innerHTML = `<p align="center">Игра началась, у вас всего 7 попыток</p>`;
    
}

let hiddenNum = createHiddenNum(1, 10);
let rounds = 7;

function play() {
    rounds--;
    let guess = parseInt(document.getElementById('form-1').value);
    if (isNaN(guess) || guess < 1 || guess > 10) {
        alert1.innerHTML = '<p align="center">Вам нужно ввести число от 1 до 10</p>';
        return;
    }
    if (rounds == 0) {
        alert("Вы не угадали, игра окончена");
        location.reload()
        return false;
    }
    if (guess == hiddenNum) {
        alert("Вы угадали, игра окончена");
        location.reload()
        return true;
    } else if (guess < hiddenNum) {
        alert1.innerHTML = `<p align="center">Загаданное число будет больше. У вас осталось ${rounds} попыток</p>`;
        if (rounds <= 0) {
            location.reload();
        }
    } else if (guess > hiddenNum) {
        alert1.innerHTML = `<p align="center">Загаданное число будет меньше. У вас осталось ${rounds} попыток</p>`;
        if (rounds <= 0) {
            location.reload();
        }
    }
}