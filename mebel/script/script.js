function toggleMenu () {
    const menu = document.querySelector('nav');
    menu.classList.toggle('active');
}

function toggleFav(){
    var fava = document.querySelector('.baction');
    var favi = fava.querySelector('i');

    favi.classList.toggle('fa-star');
    favi.classList.toggle('fa-star-o');
}


const removeFavorite = document.querySelector('.button-link');
const emptyCartMessege = document.querySelector('.empty-cart');
removeFavorite.addEventListener('click', function() {
    removeFavorite.style.display = 'none';
    emptyCartMessege.style.display = 'block';
});