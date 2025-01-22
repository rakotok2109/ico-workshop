let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');

function moveCarousel(direction) {
    const totalItems = items.length;
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + direction + totalItems) % totalItems;
    items[currentIndex].classList.add('active');
}

function toggleFlip(card) {
    const cardInner = card.querySelector('.card-inner');
    cardInner.classList.toggle('flipped');
}
