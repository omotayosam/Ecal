heart = document.getElementById('heart');

function hover_add() {
    heart.classList.replace('far', 'fa');
}

function hover_remove() {
    heart.classList.replace('fa', 'far');
}

heart.addEventListener('mouseenter', hover_add);
heart.addEventListener('mouseleave', hover_remove);