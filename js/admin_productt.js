// Edit product form properties
let productName = document.forms['add_product'].pname;
let productPrice = document.forms['add_product'].pprice;
let productStock = document.forms['add_product'].pstock;
let productStatus = document.forms['add_product'].pstatus;
let productBrand = document.forms['add_product'].pbrand;
let productCategory = document.forms['add_product'].pcategory;
let productDesc = document.forms['add_product'].pdesc;

let productForm = document.querySelector('.product-form');
let productDltConfirm = document.querySelector('.product-delete');
let addBtn = document.querySelector('.add-order');
let cancelBtn = document.querySelector('.cancel');
let productImage = document.querySelector('.product-img');
let productDescription = document.querySelector('.product-desc');
let productDetail = document.querySelector('.product-detail');
let closeBtn = document.querySelector('.close');

// Open add product form
addBtn.addEventListener('click', () => {
  document.forms['add_product'].action = 'add_product.php';
  document.forms['add_product'].reset();
  productForm.style.display = 'flex';
});

//close add product form
cancelBtn.addEventListener('click', () => {
  productForm.style.display = 'none';
})

//product detail
closeBtn.addEventListener('click', () => {
  productDetail.style.display = 'none';
});

// Display product detail
function ProductDetail(n) {
  productDetail.style.display = 'flex';
  let result;
  let requestProductInfo = new XMLHttpRequest();
  requestProductInfo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      result = JSON.parse(this.response);
      productImage.style.backgroundImage = 'url(' + result["Hinh"] + ')';
      productDescription.innerHTML = result["MoTa"];
    }
  }
  requestProductInfo.open("GET", "product_info.php?p=" + n, true);
  requestProductInfo.send();
}

// Display product information
function editProduct(n) {
  document.forms['add_product'].action = 'edit_product.php?p=' + n;
  productForm.style.display = 'flex';
  let result;
  let requestProductInfo = new XMLHttpRequest();
  requestProductInfo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      result = JSON.parse(this.response);
      productName.value = result["TenSP"];
      productPrice.value = result["Gia"];
      productStock.value = result["LuongTon"];
      productStatus.value = result["TrangThai"];
      productBrand.value = result["Hang"];
      productCategory.value = result["MaLoai"];
      productDesc.value = result["MoTa"];
    }
  }
  requestProductInfo.open("GET", "product_info.php?p=" + n, true);
  requestProductInfo.send();
}

// Display delete product alert
function deleteProduct(n) {
  document.forms['delete_product'].action = 'delete_product.php?id=' + n;
  productDltConfirm.style.display = 'flex';
}

// Filter category
$(document).ready(function () {
  $("#category").on("change", function () {
    var value = $(this).val();
    $("#product-table tr").filter(function () {
      $(this).toggle($(this).text().indexOf(value) > -1);
    });
  });
});

// Filter status
$(document).ready(function () {
  $("#status").on("change", function () {
    var value = $(this).val();
    $("#product-table tr").filter(function () {
      $(this).toggle($(this).text().indexOf(value) > -1);
    });
  });
});

window.onclick = function (event) {
  if (event.target == productForm) {
    productForm.style.display = 'none';
  }
  if (event.target == productDetail) {
    productDetail.style.display = 'none';
  }
  if (event.target == productDltConfirm) {
    productDltConfirm.style.display = 'none';
  }
}