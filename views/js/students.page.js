const studentsTableRows = document.querySelectorAll('.tbody-row');
studentsTableRows.forEach(row => {
    const showBrifsBtn = row.querySelector('a');
    showBrifsBtn.addEventListener('click', e=>{
    window.location.href = `main?page=student-projects&&id=${row.id}`
    });
});