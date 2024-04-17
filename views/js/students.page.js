const studentsTableRows = document.querySelectorAll('.tbody-row');
studentsTableRows.forEach(row => {
    const showBrifsBtn = row.querySelector('a');
    showBrifsBtn.addEventListener('click', e=>{
    window.location.href = `main?page=student-projects&&id=${row.id}`
    });
});

document.querySelector('input').addEventListener('input', e =>{
    document.querySelectorAll('.tbody-row').forEach(row =>{
        let name = row.querySelector('.name').innerText;
        let lastName = row.querySelector('.lastName').innerText;
        if ((name+lastName).toLowerCase().includes(e.target.value.toLowerCase())) row.style.display = "flex";
        else row.style.display = "none";
    });
});