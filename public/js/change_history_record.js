const btn = document.querySelector(".history-container__btn-change-record");
btn.addEventListener("click", () => {
    const input = document.querySelector("history-container__input");
    input.classList.toggle("open-input-change-history-record");
});