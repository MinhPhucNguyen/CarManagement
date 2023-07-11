

// Auto Close Alert
const alertSuccess = document.querySelector(".alert-success");
const alertDanger = document.querySelector(".alert-danger");
// console.log(alertSuccess);
if (alertSuccess) {
    setTimeout(function () {
        alertSuccess.remove();
    }, 5000);
}

if (alertDanger) {
    setTimeout(function () {
        alertDanger.remove();
    }, 5000);
}
// End Auto Close Alert

//Handle filter by
const filterBy = document.querySelector(".filter-by");
const filterByFuel = document.querySelector(".filter-by-fuel");

if (filterBy) {
    filterBy.addEventListener("change", function () {
        this.form.submit();
    });
}

if (filterByFuel) {
    filterByFuel.addEventListener("change", function () {
        this.form.submit();
    });
}

//Handle sort by ID
const sortIdIcon = document.querySelectorAll(".sort-id-icon i");

for (let i = 0; i < sortIdIcon.length; i++) {
    sortIdIcon[i].addEventListener("click", function () {
        const sortColumn = this.closest("th").getAttribute("data-sort");
        const sortDirection = this.classList.contains("fa-arrow-down")
            ? "asc"
            : "desc";
        window.location.href =
            "?sort=" + sortColumn + "&direction=" + sortDirection;
    });
}
