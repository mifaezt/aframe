document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".section");

    const observerOptions = {
        root: null, // Отслеживаем относительно viewport
        rootMargin: "0px",
        threshold: 0.2, // Секция появится, когда 20% её будет видно
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target); // Прекращаем отслеживание после появления
            }
        });
    }, observerOptions);

    sections.forEach((section) => {
        observer.observe(section); // Начинаем отслеживать каждую секцию
    });
});
