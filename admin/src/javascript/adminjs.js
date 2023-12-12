// variable
let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let closeBtn = document.querySelectorAll(".btn");

// EventListener
btn.addEventListener("click", () => {
    modal.classList.add("show");
});

closeBtn.forEach((eachBtn) => {
    eachBtn.addEventListener("click", () => {
        modal.classList.remove("show");
    });
});

window.onclick = function (event) {
    if (event.target == modal) {
        modal.classList.remove("show");
    }
};



// ---------------------------SẢN PHẨM---
// click icon => form sửa sản phẩm 
function getId(event, id_product) {
    // In ra giá trị id
    // console.log("ID của liên kết là: " + id_product);

    let modalId = "modal_fix-" + id_product;
    let modal = document.getElementById(modalId);
    modal.classList.add("show");
}

// click => ẩn form sửa sản phẩm
function hideModalfix(event, id_product) {
    event.preventDefault();

    // Tạo id của phần tử modal tương ứng
    var modalId = "modal_fix-" + id_product;

    // Lấy phần tử modal dựa trên id
    var modal = document.getElementById(modalId);

    modal.classList.remove("show");
}

// Get all the anchor elements with the class "fill-input"
const fillInputLinks = document.querySelectorAll(".fill-input");
const inputProducer = document.getElementById("input_value_producer");
const inputIdProducer = document.getElementById("id_producer");

// Thêm sự kiện click cho các phần tử anchor
fillInputLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn liên kết điều hướng

        // Lấy giá trị 'id_producer' và 'name_producer' từ thuộc tính dữ liệu của phần tử anchor đã nhấp
        const dataId = link.getAttribute("data-id");
        const dataName = link.getAttribute("data-name");

        // Đặt giá trị của trường input 'input_value_producer' thành 'name_producer' (hiển thị)
        // và giá trị của trường input ẩn 'id_producer' thành 'id_producer' (giá trị)
        inputProducer.value = dataName;
        inputIdProducer.value = dataId;
    });
});

// Get all the anchor elements with the class "fill-input"
const fillfixInputLinks = document.querySelectorAll(".fill-fix_input");
const inputfixProducer = document.getElementById("input_value_fix_producer");
const inputfixIdProducer = document.getElementById("id_fix_producer");

// Thêm sự kiện click cho các phần tử anchor
fillfixInputLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn liên kết điều hướng

        // Lấy giá trị 'id_producer' và 'name_producer' từ thuộc tính dữ liệu của phần tử anchor đã nhấp
        const dataIdfix = link.getAttribute("data-id");
        const dataNamefix = link.getAttribute("data-name");

        // Đặt giá trị của trường input 'input_value_producer' thành 'name_producer' (hiển thị)
        // và giá trị của trường input ẩn 'id_producer' thành 'id_producer' (giá trị)
        inputfixIdProducer.value = dataIdfix;
        inputfixProducer.value = dataNamefix;

        console.log("Đã chọn dataIdfix:", dataIdfix);
        console.log("Đã chọn dataNamefix:", dataNamefix);
    });
});
// ------------------------HẾT SẢN PHẨM---



// ---------------------------NHÂN VIÊN---
// click icon => form sửa nhân viên
function getId_employee(event, id_employee) {
    // In ra giá trị id
    // console.log("ID của liên kết là: " + id_employee);

    let modalId = "modal_employee-" + id_employee;
    let modal = document.getElementById(modalId);
    modal.classList.add("show");
}

// click => ẩn form sửa nhân viên
function hideModal(event, id_employee) {
    event.preventDefault();

    // Tạo id của phần tử modal tương ứng
    var modalId = "modal_employee-" + id_employee;

    // Lấy phần tử modal dựa trên id
    var modal = document.getElementById(modalId);

    modal.classList.remove("show");
}
// -----------------------HẾT NHÂN VIÊN---



// ---------------------------KHÁCH HÀNG---
// click icon => form sửa nhân viên
function getId_customer(event, id_customer) {
    // In ra giá trị id
    // console.log("ID của liên kết là: " + id_customer);

    let modalId = "modal_customer-" + id_customer;
    let modal = document.getElementById(modalId);
    modal.classList.add("show");
}

// click => ẩn form sửa nhân viên
function hideModalcustomer(event, id_customer) {
    event.preventDefault();

    // Tạo id của phần tử modal tương ứng
    var modalId = "modal_customer-" + id_customer;

    // Lấy phần tử modal dựa trên id
    var modal = document.getElementById(modalId);

    modal.classList.remove("show");
}
// -----------------------HẾT KHÁCH HÀNG---

// ---------------------------------BLOG---
// click icon => form sửa nhân viên
function getId_blog(event, id_blog) {
    event.preventDefault();
    // In ra giá trị id
    // console.log("ID của liên kết là: " + id_employee);

    let modalId = "modal_fix_blog-" + id_blog;
    let modal = document.getElementById(modalId);
    modal.classList.add("show");
}

// click => ẩn form sửa nhân viên
function hideModalfixBlog(event, id_blog) {
    event.preventDefault();

    // Tạo id của phần tử modal tương ứng
    var modalId = "modal_fix_blog-" + id_blog;

    // Lấy phần tử modal dựa trên id
    var modal = document.getElementById(modalId);

    modal.classList.remove("show");
}
// --------------------------------HẾT BLOG---


// ---------------------------------ORDER---
// click icon => form sửa nhân viên
function getId_order(event, id_donhang) {
    event.preventDefault();
    // In ra giá trị id
    // console.log("ID của liên kết là: " + id_employee);

    let modalId = "modal_fix_order-" + id_donhang;
    let modal = document.getElementById(modalId);
    modal.classList.add("show");
}

// click => ẩn form sửa nhân viên
function hideModalfixOrder(event, id_donhang) {
    event.preventDefault();

    // Tạo id của phần tử modal tương ứng
    var modalId = "modal_fix_order-" + id_donhang;

    // Lấy phần tử modal dựa trên id
    var modal = document.getElementById(modalId);

    modal.classList.remove("show");
}
// --------------------------------HẾT ORDER---