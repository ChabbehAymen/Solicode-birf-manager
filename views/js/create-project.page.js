document.querySelector("#img-input").addEventListener("change", (e) => {
  let reader = new FileReader();
  reader.onload = function (e) {
    document.querySelector(
      ".img-input-label"
    ).style.backgroundImage = `url(${e.target.result})`;
    document.querySelector(".brif-preview-img").src = e.target.result;
  };
  reader.readAsDataURL(e.target.files[0]);
});

document.querySelector('input[name="title"]').addEventListener("input", (e) => {
  let cardTitle = "";
  e.target.value === null || e.target.value === ""
    ? (cardTitle = "Card title")
    : (cardTitle = e.target.value);
  document.querySelector(".card-title").innerText = cardTitle;
  document.querySelector(".file-name").innerText = cardTitle;
});

document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    let checkBoxes = document.querySelectorAll(
      'input[type="checkbox"]:checked'
    );
    document.querySelectorAll(".comps-container").forEach((e) => {
      e.innerHTML = "";
    });
    checkBoxes.forEach((e) => {
      document.querySelectorAll(".comps-container").forEach((card) => {
        card.innerHTML += `
        <p class="rounded-pill w-max border border-dark px-3 form-text text-black">${e.id}</p>`;
      });
    });
  });
});

document
  .querySelector('input[name="create"]')
  .addEventListener("click", (e) => {
    if (document.querySelector('input[name="img-file"]').value === "")
      document.querySelector(".img-file-error").style.display = "block";
    if (
      document.querySelectorAll('input[type="checkbox"]:checked').length <= 0
    ) {
      e.preventDefault();
      document.querySelector(".check-box-error").style.display = "block";
    }
  });
