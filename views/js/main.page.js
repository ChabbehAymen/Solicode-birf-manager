const navLinks = document.querySelectorAll("nav span");

navLinks.forEach((selectedElement) => {
selectedElement.addEventListener("click", (e) => {
  selectedElement.querySelector("svg").style.fill = "white";
    selectedElement.classList.add("selected-tab");
    selectedElement.classList.remove("text-blue-500");
    toggleOfUnselectedTabs();
  });
});

function toggleOfUnselectedTabs(){
    navLinks.forEach((element) => {
        if (element != selectedElement) {
          element.classList.remove("selected-tab");
          element.classList.add("text-blue-500");
          element.querySelector("svg").style.fill = "rgb(59 130 246 / 500)";
          console.log(element.querySelector("svg"));
        }
      });
}
