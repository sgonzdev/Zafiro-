document.addEventListener("DOMContentLoaded", function () {
    const filterSidebar = document.querySelector(".filter-sidebar");
    const carouselArrow = document.querySelector(".carousel-arrow");
    carouselArrow.addEventListener("click", function () {
        filterSidebar.classList.toggle("expanded");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const arrowUp = document.getElementById("arrow-up");
    const arrowDown = document.getElementById("arrow-down");
    const brands = document.querySelectorAll(".filter-option");
    const brandsPerPage = 3;
    let currentStartIndex = 0;

    const updateBrandsDisplay = () => {
        brands.forEach((brand) => {
            brand.style.display = "none";
        });

        for (
            let i = currentStartIndex;
            i < currentStartIndex + brandsPerPage;
            i++
        ) {
            if (brands[i]) {
                brands[i].style.display = "block";
            }
        }

        if (currentStartIndex === 0) {
            arrowUp.style.display = "none";
            arrowDown.style.display = "inline";
        } else if (currentStartIndex + brandsPerPage >= brands.length) {
            // Último grupo: solo flecha hacia arriba
            arrowUp.style.display = "inline";
            arrowDown.style.display = "none";
        } else {
            // Grupos intermedios: ambas flechas
            arrowUp.style.display = "inline";
            arrowDown.style.display = "inline";
        }
    };

    if (arrowDown) {
        arrowDown.addEventListener("click", () => {
            currentStartIndex += brandsPerPage;
            updateBrandsDisplay();
        });
    }

    if (arrowUp) {
        arrowUp.addEventListener("click", () => {
            currentStartIndex -= brandsPerPage;
            updateBrandsDisplay();
        });
    }
    updateBrandsDisplay();
});

document.addEventListener("DOMContentLoaded", function () {
    function setupTooltips() {
        const nameContainers = document.querySelectorAll(".name-container");
        nameContainers.forEach((container) => {
            const textElement = container.querySelector(".product-name");
            const tooltip = container.querySelector(".tooltip");

            if (textElement.scrollWidth <= textElement.clientWidth) {
                tooltip.style.display = "none";
            } else {
                tooltip.style.display = "block";
            }
        });

        const descContainers = document.querySelectorAll(".desc-container");
        descContainers.forEach((container) => {
            const textElement = container.querySelector(".product-description");
            const tooltip = container.querySelector(".tooltip");

            if (textElement.scrollWidth <= textElement.clientWidth) {
                tooltip.style.display = "none";
            } else {
                tooltip.style.display = "block";
            }
        });
    }
    setTimeout(setupTooltips, 100);
    window.addEventListener("load", setupTooltips);
    window.addEventListener("resize", setupTooltips);
});
