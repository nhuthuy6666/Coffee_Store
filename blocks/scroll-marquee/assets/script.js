let lastScrollY = window.pageYOffset;
let position = 0;            // marquee location
let rotation = 0;            // image rotation

window.addEventListener("scroll", () => {
    const current = window.pageYOffset;
    const direction = current > lastScrollY ? 1 : -1; // down = left, up = right

    position += direction * 3;     // marquee speed
    rotation += direction * 2;     // image rotation

    document.getElementById("marquee-content").style.transform =
        `translateX(${position}px)`;

    document.querySelectorAll(".img-item").forEach(img => {
        img.style.transform = `rotate(${rotation}deg)`;
    });

    lastScrollY = current;
});