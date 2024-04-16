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