let iconBackPage = document.querySelector(".icon-back");
if (iconBackPage) {
    iconBackPage.addEventListener("click", function () {
        toggleLoadingLogo();
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

window.onscroll = () => {
    const headerDetailProduk = document.querySelector(".header-product");
    const fieldSearchDetailProduk = document.querySelector(
        ".header-product .field-search:not(.without-hidden)"
    );
    const scroll = window.scrollY;
    if (headerDetailProduk && fieldSearchDetailProduk) {
        if (scroll > 10) {
            $(headerDetailProduk)
                .removeClass("bg-transparent")
                .addClass("bg-white shadow-sm");

            fieldSearchDetailProduk.classList.remove("hidden");
        } else {
            $(headerDetailProduk)
                .removeClass("bg-white shadow-sm")
                .addClass("bg-transparent");

            fieldSearchDetailProduk.classList.add("hidden");
        }
    }
};

const haveMenuBottom = document.querySelector(
    ".fixed-bottom.section-menu-bottom"
);
const haveMenuBottomAction = document.querySelector(
    ".fixed-bottom.action-produk"
);
if (haveMenuBottom || haveMenuBottomAction) {
    document.querySelector(".container.section-content").style.marginBottom =
        "100px";
}

const previewImage = (
    event,
    targetPreview,
    targetTakeName,
    valueOrTextContentOrInnerHTML
) => {
    const preview = document.querySelector(targetPreview);
    const [file] = event.target.files;
    if (file) {
        preview.src = URL.createObjectURL(file);
        if (targetTakeName) {
            document.querySelector(targetTakeName)[
                valueOrTextContentOrInnerHTML
            ] = file.name;
        }
    }
};

var myModalEl = document.getElementById("modalPencarian");
if (myModalEl) {
    var modal = bootstrap.Modal.getOrCreateInstance(myModalEl); // Returns a Bootstrap modal instance

    $(".trigger-modal-search").on("click", function () {
        const input = document.querySelector("#inputFieldSearch");
        const trigger = $(this);

        if (trigger.hasClass("with-placeholder")) {
            input.setAttribute("placeholder", trigger.attr("placeholder"));
        }
        modal.show();
        myModalEl.addEventListener("shown.bs.modal", function (event) {
            input.focus();
        });
    });
}
function filterAction(href) {
    toggleLoadingLogo();
    window.location.href = href;
}

function backPage() {
    const href = document.querySelector(".data-current-page").textContent;
    filterAction(href)
}
