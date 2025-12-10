let lastScrollY = window.pageYOffset;
let position = 0;            // marquee location
let rotation = 0;            // image rotation

window.addEventListener("scroll", () => {
    const current = window.pageYOffset;
    const delta = current - lastScrollY; // down = left, up = right

    position += delta * 0.5;     // marquee speed
    rotation += delta * 0.3;     // image rotation

    document.getElementById("marquee-content").style.transform =
        `translateX(${position}px)`;

    document.querySelectorAll(".img-item").forEach(img => {
        img.style.transform = `rotate(${rotation}deg)`;
    });

    lastScrollY = current;
});