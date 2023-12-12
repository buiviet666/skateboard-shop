function validateFormLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Kiểm tra xem username có rỗng hay không
    if (username === "") {
        alert("Vui lòng nhập tên đăng nhập.");
        return false;
    }

    // Kiểm tra độ dài username phải lớn hơn hoặc bằng 6 ký tự
    if (username.length < 6) {
        alert("Tên đăng nhập phải có ít nhất 6 ký tự.");
        return false;
    }

    if (password === "") {
        alert("Vui lòng nhập mật khẩu.");
        return false;
    }

    // Kiểm tra độ dài password phải lớn hơn hoặc bằng 6 ký tự
    if (password.length < 6) {
        alert("Mật khẩu phải có ít nhất 6 ký tự.");
        return false;
    }

    // Kiểm tra xem password có ít nhất 3 chữ cái
    var letterCount = password.replace(/[^a-zA-Z]/g, "").length;
    if (letterCount < 3) {
        alert("Mật khẩu phải chứa ít nhất 3 chữ cái.");
        return false;
    }

    // Kiểm tra xem password có ít nhất 3 chữ số
    var digitCount = password.replace(/[^0-9]/g, "").length;
    if (digitCount < 3) {
        alert("Mật khẩu phải chứa ít nhất 3 chữ số.");
        return false;
    }

    // Kiểm tra xem password có ít nhất 1 chữ cái viết hoa
    if (!/[A-Z]/.test(password)) {
        alert("Mật khẩu phải chứa ít nhất 1 chữ cái viết hoa.");
        return false;
    }

    // Kiểm tra xem password có ít nhất 1 ký tự đặc biệt
    if (!/[!@#$%^&*]/.test(password)) {
        alert("Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt.");
        return false;
    }

    // Nếu mọi thứ đều hợp lệ, cho phép gửi form
    return true;
}


function validateFormSignin() {
    const name = document.getElementById('name_user').value;
    const login = document.getElementById('login_user').value;
    const password = document.getElementById('password_user').value;
    const phone = document.getElementById('phone_user').value;
    const email = document.getElementById('email_user').value;

    // Check if any field is empty
    if (!name || !login || !password || !phone || !email) {
        alert('Vui lòng điền đầy đủ thông tin.');
        return false;
    }

    // Check name length
    if (name.length < 6) {
        alert('Tên phải có ít nhất 6 ký tự.');
        return false;
    }

    // Check login length
    if (login.length < 6) {
        alert('Tên người dùng phải có ít nhất 6 ký tự.');
        return false;
    }

    // Check password format: At least 6 characters, 3 digits, 3 letters, 1 special character, 1 uppercase letter
    const passwordRegex = /^(?=.*\d{3})(?=.*[a-zA-Z]{3})(?=.*[!@#$%^&*])(?=.*[A-Z]).{6,}$/;
    if (!password.match(passwordRegex)) {
        alert('Mật khẩu không đáp ứng yêu cầu.');
        return false;
    }

    // Check phone length
    if (phone.length < 6 || phone.length > 10) {
        alert('Số điện thoại phải từ 6 đến 10 ký tự.');
        return false;
    }

    // Check email format
    const emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/;
    if (!email.match(emailRegex)) {
        alert('Địa chỉ email không hợp lệ.');
        return false;
    }

    return true; // Allow form submission
}