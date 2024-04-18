document.querySelector('input').addEventListener('input', e =>{
    document.querySelectorAll('.card').forEach(card =>{
        if (card.querySelector('.card-title').innerText.toLowerCase().includes(e.target.value.toLowerCase())) card.style.display = "flex";
        else card.style.display = "none";
    });
});

document.querySelectorAll('.card').forEach(card=>{
    let badge = card.querySelector('.badge');
    if(badge.innerText === 'TODO') badge.classList.add('bg-gray-400');
    if(badge.innerText === 'DOING') badge.classList.add('bg-green-400');
    if(badge.innerText === 'DONE') badge.classList.add('bg-blue-500');
    if(badge.innerText === 'NOT COMPLETED') badge.classList.add('bg-red-400');

})