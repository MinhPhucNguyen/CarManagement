// Auto Close Alert
const alertSuccess = document.querySelector(".alert-success");
const alertDanger = document.querySelector(".alert-danger");
// console.log(alertSuccess);
if (alertSuccess) {
    setTimeout(function () {
        alertSuccess.remove();
    }, 2500);
}

if (alertDanger) {
    setTimeout(function () {
        alertDanger.remove();
    }, 3000);
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
var filterIcons = document.querySelectorAll(".filter-down-up-icon");

for (let i = 0; i < filterIcons.length; i++) {
    filterIcons[i].addEventListener("click", function () {
        console.log(filterIcons[i]);
        // const sortDirection = this.classList.contains("sort-up")
        //     ? "asc"
        //     : "desc";
        // console.log(sortDirection);
        // const sortField = this.closest("th").getAttribute("data-sort"); //tìm phần tử cha gần nhất và lấy attribute
        // // window.location.href = '?sort=' + sortField + '&direction=' + sortDirection;
    });
}

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
