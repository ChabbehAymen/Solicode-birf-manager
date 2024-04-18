const navLinks = document.querySelectorAll("nav span");

navLinks.forEach((selectedElement) => {
  if (selectedElement.classList.contains("selected-tab")) {
    selectedElement.querySelector("svg").style.fill = "white";
    selectedElement.classList.remove("text-blue-500");
  } else {
    selectedElement.classList.add("text-blue-500");
  }
  selectedElement.addEventListener("click", (e) => {
    window.location.href = `mainStudent?page=${selectedElement.id}`
  });
});

document.querySelectorAll('.briefStart').forEach(e=>{
  if (e!== null){
  e.addEventListener('click', ev => {
  console.log(ev)
    window.location.href = `mainStudent?page=onBoard&briefid=${e.id}`
  });
  }
});