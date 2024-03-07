let cards = document.querySelectorAll('.future .card');
let hidden = document.querySelector('#future-hidden');
let show = document.querySelector('#future-show');

hidden.addEventListener('click', function() {
    cards.forEach(card => {
        card.style.display = 'none'
    });
});
show.addEventListener('click', function() {
    cards.forEach(card => {
        card.style.display = 'block'
    });
});


