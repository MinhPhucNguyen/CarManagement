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

//Handle selected view left item in view a user
const itemSelect = document.querySelectorAll(".view-left-item");
const email = document.querySelector("#email");
const profile = document.querySelector("#profile");

itemSelect.forEach((item) => {
    item.addEventListener("click", function () {
        itemSelect.forEach((otherItem) => {
            otherItem.classList.toggle("selected", otherItem === item);
        });

        profile.classList.toggle("active", this === itemSelect[0]);
        email.classList.toggle("active", this !== itemSelect[0]);
    });
});

//Handle change avatar
const changeAvatarBtn = document.querySelector(".change-avatar-btn");
const changeAvatarInput = document.querySelector("#avatar-file-input");
const imageAvatarLoading = document.querySelector(".image-avatar img");
const overlay = document.querySelector(".overlay");

changeAvatarBtn.addEventListener("click", function () {
    changeAvatarInput.click();
});

changeAvatarInput.addEventListener("change", function () {
    overlay.style.display = "block";
    this.form.submit();
});

imageAvatarLoading.addEventListener("load", function () {
    overlay.style.display = "none";
});

//Handle display image when input
const fileInput = document.querySelector(".file-input");
const displayImage = document.querySelector(".display_image");

fileInput.addEventListener("change", function () {
    // console.log(fileInput.files);
    for (const file of fileInput.files) {
        const imageURL = URL.createObjectURL(file);
        const imageItem = document.createElement("div");
        const img = document.createElement("img");
        const removeBtn = document.createElement("button");

        imageItem.classList.add("car_image_input");
        removeBtn.classList.add("remove_btn", "btn", "btn-danger");
        removeBtn.textContent = "Remove";
        removeBtn.type = "button";

        img.src = imageURL;
        img.classList.add("image_input");

        imageItem.appendChild(img);
        imageItem.appendChild(removeBtn);
        displayImage.appendChild(imageItem);

        removeBtn.addEventListener("click", function () {
            // get index of the file in fileInput.files
            const index = Array.prototype.indexOf.call(fileInput.files, file);
            // console.log(index);

            const newFileList = new DataTransfer(); //new DataTranfer() used to hold the data
            // console.log(newFileList.files);
            // console.log(fileInput.files.length);
            for (let i = 0; i < fileInput.files.length; i++) {
                if (i !== index) {
                    newFileList.items.add(fileInput.files[i]); //Add new file (not remove) to newFileList
                }
            }
            fileInput.files = newFileList.files;
            imageItem.remove();
        });
    }
});
