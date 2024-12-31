// Code d'origine: https://codepen.io/clementGir/pen/RQqvQx

const $bigBall = document.querySelector('.cursor__ball--big');
const $smallBall = document.querySelector('.cursor__ball--small');
const links = document.querySelectorAll('a');

const storedCursorPosition = JSON.parse(localStorage.getItem('cursorPosition'));

let cursorX = storedCursorPosition ? storedCursorPosition.x : 0;
let cursorY = storedCursorPosition ? storedCursorPosition.y : 0;

TweenMax.set($bigBall, { x: cursorX - 15, y: cursorY - 15 });
TweenMax.set($smallBall, { x: cursorX - 5, y: cursorY - 7 });

function updateCursorPosition(e) {
    cursorX = e.clientX;
    cursorY = e.clientY;

    localStorage.setItem('cursorPosition', JSON.stringify({ x: cursorX, y: cursorY }));

    TweenMax.to($bigBall, .4, { x: cursorX - 15, y: cursorY - 15 });
    TweenMax.to($smallBall, .1, { x: cursorX - 5, y: cursorY - 7 });
}

document.body.addEventListener('mousemove', updateCursorPosition);

links.forEach(link => {
    link.addEventListener('mouseenter', () => {
        TweenMax.to($bigBall, .3, { scale: 4 });
    });
    link.addEventListener('mouseleave', () => {
        TweenMax.to($bigBall, .3, { scale: 1 });
    });
});
