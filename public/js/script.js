document.onreadystatechange = function () {
    if (document.readyState == "complete") {
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
                    tp.setAttribute(
                        "class",
                        "bi bi-eye-slash-fill toggle-password"
                    );
                } else {
                    targetInput.setAttribute("type", "password");
                    tp.setAttribute("class", "bi bi-eye-fill toggle-password");
                }
                showPassword = !showPassword;
            });
        });
    }
};

const iconBack = document.querySelector("i.icon-back");
if(iconBack){

    iconBack.addEventListener("click", function () {
        window.location = document.referrer;
    });
}
