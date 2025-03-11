document.addEventListener("DOMContentLoaded", function () {
    const blocks = document.querySelectorAll(".interior-block");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("interior-fade-in");
                    observer.unobserve(entry.target); // Останавливаем наблюдение после появления
                }
            });
        },
        {
            threshold: 0.1, // Блок появится, когда 10% его будет видно
        }
    );

    blocks.forEach((block) => {
        observer.observe(block);
    });
});
