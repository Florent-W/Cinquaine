const password_fields = [...document.querySelectorAll(".password")];
const buttons = [...document.querySelectorAll(".toggle")];

const show = function (ev) {
    toggle(ev.currentTarget, "text");
}

const hide = function (ev) {
    toggle(ev.currentTarget, "password");
}

const toggle = function (el, type) {
    const pfield = password_fields[buttons.indexOf(el)];
    if (pfield.getAttribute("type") != type) {
        el.querySelector("i").classList.toggle("bi-eye");
    }
    pfield.setAttribute("type", type);
}

buttons.forEach(e => {
    e.addEventListener("mousedown", show);
    e.addEventListener("mouseleave", hide);
    e.addEventListener("mouseup", hide);
})