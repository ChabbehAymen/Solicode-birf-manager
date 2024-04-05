const navLinks = document.querySelectorAll("nav span");

navLinks.forEach((selectedElement) => {
  if (selectedElement.classList.contains("selected-tab")) {
    console.log(selectedElement);
    selectedElement.querySelector("svg").style.fill = "white";
    selectedElement.classList.remove("text-blue-500");
  } else {
    selectedElement.classList.add("text-blue-500");
  }
  // ajax for page requireing
  selectedElement.addEventListener("click", (e) => {
    console.log(selectedElement);
    window.location.href = `main?page=${selectedElement.id}`
  });
});
