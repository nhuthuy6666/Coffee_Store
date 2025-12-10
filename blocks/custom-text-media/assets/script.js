document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll("[data-animate]");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.dataset.animate === "left") {
                    entry.target.classList.add("animate-fadeInLeft");
                    entry.target.classList.remove("animate-fadeOutLeft");
                }
                if (entry.target.dataset.animate === "right") {
                    entry.target.classList.add("animate-fadeInRight");
                    entry.target.classList.remove("animate-fadeOutRight");
                }
            } else {
                if (entry.target.dataset.animate === "left") {
                    entry.target.classList.remove("animate-fadeInLeft");
                    entry.target.classList.add("animate-fadeOutLeft");
                }
                if (entry.target.dataset.animate === "right") {
                    entry.target.classList.remove("animate-fadeInRight");
                    entry.target.classList.add("animate-fadeOutRight");
                }
            }
        });
    }, {
        threshold: 0.6
    });

    items.forEach(item => observer.observe(item));
});
