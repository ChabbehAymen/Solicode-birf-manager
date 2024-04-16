document.querySelector('input').addEventListener('input', e =>{
    document.querySelectorAll('.card').forEach(card =>{
        if (card.querySelector('.card-title').innerText.toLowerCase().includes(e.target.value.toLowerCase())) card.style.display = "block";
        else card.style.display = "none";
    });
});