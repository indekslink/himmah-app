let iconBackPage = document.querySelector("i.icon-back");
if (iconBackPage) {
    iconBackPage.addEventListener("click", function () {
        if (iconBackPage.hasAttribute("data-current-page")) {
            return (window.location =
                iconBackPage.getAttribute("data-current-page"));
        }
        return (window.location = document.referrer);
    });
}
const loadingLogo = document.querySelector(".parent-loading");
const loadingAction = document.querySelector(".loading-action");
window.onload = function () {
    toggleLoadingLogo();
};
let showPassword = true;
const togglePassword = document.querySelectorAll("i.toggle-password");

togglePassword.forEach((tp) => {
    tp.addEventListener("click", function () {
        const targetInput = document.querySelector(
            `input[toggle-password="${tp.getAttribute(
                "data-toggle-password"
            )}"]`
        );
        if (showPassword) {
            targetInput.setAttribute("type", "text");
            tp.setAttribute("class", "bi bi-eye-slash-fill toggle-password");
        } else {
            targetInput.setAttribute("type", "password");
            tp.setAttribute("class", "bi bi-eye-fill toggle-password");
        }
        showPassword = !showPassword;
    });
});
const showLoadingLogo = document.querySelectorAll(
    ".show-loading-logo-on-click"
);
showLoadingLogo.forEach((loading) => {
    loading.addEventListener("click", function () {
        toggleLoadingLogo();
    });
});
function toggleLoadingLogo(event, msg = null) {
    if (event) {
        event.preventDefault();
        const confirm = window.confirm(msg);
        console.log(confirm);
        if (confirm) {
            event.target.submit();
            return loadingLogo.classList.toggle("hide");
        }
        return false;
    }
    return loadingLogo.classList.toggle("hide");
}
function toggleLoadingAction() {
    loadingAction.classList.toggle("show");
}
