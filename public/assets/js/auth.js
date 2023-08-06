const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

const login = async (username, password) => {
    try {
        const response = await fetch("http://127.0.0.1:8000/api/login", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                username,
                password,
            }),
        });

        if (response.status === 200) {
            const data = await response.json();
            return data;
        } else {
            return response.json().then((error) => {
                throw new Error(error.message);
            });
        }
    } catch (error) {
        alert(error);
    }
};

const loginForm = document.querySelector("#login-form");
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const username = document.querySelector("#username").value;
    const password = document.querySelector("#password").value;

    await login(username, password)
        .then((response) => {
            const user = response.data.user;
            const userRole_as = user.role_as;
            if (userRole_as === 1) {
                window.location.href = "/admin/dashboard";
            } else if (userRole_as === 0) {
                window.location.href = "/home";
            }
        })
        .catch((error) => {
            if (
                error.message !== "Đăng nhập thành công" &&
                error.message !==
                    "*Vui lòng nhập tên đăng nhập (and 1 more error)"
            ) {
                alert(error.message);
            } else if (
                error.message ===
                "*Vui lòng nhập tên đăng nhập (and 1 more error)"
            ) {
                alert("*Vui lòng nhập thông tin đăng nhập");
            }
        });
});

