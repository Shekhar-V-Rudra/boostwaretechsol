document.addEventListener("DOMContentLoaded", async () => {
    await injectLayout();
    setupMenu();
    highlightActiveNav();
    setYear();
    protectSourceView();
});

async function injectLayout() {
    const headerHost = document.getElementById("site-header");
    const footerHost = document.getElementById("site-footer");

    if (headerHost) {
        const headerRes = await fetch("partials/header.html");
        headerHost.innerHTML = await headerRes.text();
    }

    if (footerHost) {
        const footerRes = await fetch("partials/footer.html");
        footerHost.innerHTML = await footerRes.text();
    }
}

function setupMenu() {
    const btn = document.getElementById("menu-btn");
    const mobileNav = document.getElementById("mobile-nav");

    if (!btn || !mobileNav) {
        return;
    }

    btn.addEventListener("click", () => {
        mobileNav.classList.toggle("open");
    });
}

function highlightActiveNav() {
    const page = document.body.dataset.page;
    if (!page) {
        return;
    }

    document.querySelectorAll(`[data-nav="${page}"]`).forEach((link) => {
        link.classList.add("active");
    });
}

function setYear() {
    const yearEl = document.getElementById("year");
    if (yearEl) {
        yearEl.textContent = String(new Date().getFullYear());
    }
}

function protectSourceView() {
    document.addEventListener("contextmenu", (event) => {
        event.preventDefault();
    });

    document.addEventListener("keydown", (event) => {
        const key = event.key.toLowerCase();
        const isCtrl = event.ctrlKey || event.metaKey;
        const blockedCombo =
            (isCtrl && key === "u") ||
            (isCtrl && event.shiftKey && (key === "i" || key === "j" || key === "c")) ||
            key === "f12";

        if (blockedCombo) {
            event.preventDefault();
        }
    });
}
