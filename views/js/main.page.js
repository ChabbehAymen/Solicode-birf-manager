const navLinks = document.querySelectorAll("nav span");

navLinks.forEach((selectedElement) => {
  if (selectedElement.classList.contains("selected-tab")) {
    selectedElement.querySelector("svg").style.fill = "white";
    selectedElement.classList.remove("text-blue-500");
  } else {
    selectedElement.classList.add("text-blue-500");
  }
  selectedElement.addEventListener("click", (e) => {
    window.location.href = `main?page=${selectedElement.id}`;
  });
});

document.querySelectorAll(".card").forEach((card) => {
  let badge = card.querySelector(".badge");
  if (badge !== null && badge.innerText === "DONE")
    badge.classList.add("bg-blue-500");
  if (badge !== null && badge.innerText === "DOGIN")
    badge.classList.add("bg-green-400");
  if (badge !== null && badge.innerText === "TODO")
    badge.classList.add("bg-gray-400");
  if (badge !== null && badge.innerText === "NOT COMPLETED")
    badge.classList.add("bg-red-400");
});

let daysIndicator = document.querySelectorAll(".days-holder");
if (daysIndicator !== null) {
  daysIndicator.forEach((e) => {
    if (e.querySelector(".days-indicator").innerText === "ENDED ") {
      e.innerHTML = '<span class="badge bg-red-300" >EXPIRED</span>';
    }
  });
}
