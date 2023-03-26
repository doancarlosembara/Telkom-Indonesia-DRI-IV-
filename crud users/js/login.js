const sign_in_btn = document.querySelector("#sign-in-btnlogin");
const sign_up_btn = document.querySelector("#sign-up-btnlogin");
const containerlogin = document.querySelector(".containerlogin");

sign_up_btn.addEventListener("click", () => {
  containerlogin.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  containerlogin.classList.remove("sign-up-mode");
});
