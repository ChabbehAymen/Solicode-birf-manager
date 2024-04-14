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
    let cardTitle = '';
    e.target.value === null || e.target.value ===''?cardTitle = 'Card title': cardTitle = e.target.value;
    document.querySelector('.card-title').innerText = cardTitle;
    document.querySelector('.file-name').innerText = cardTitle;
});
