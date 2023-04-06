// Form properties
let productName = document.forms['add_product'].pname;
let productPrice = document.forms['add_product'].pprice;
let productStock = document.forms['add_product'].pstock;
let productStatus = document.forms['add_product'].pstatus;
let productBrand = document.forms['add_product'].pbrand;
let productCategory = document.forms['add_product'].pcategory;
let productDesc = document.forms['add_product'].pdesc;
let productImage = document.forms['add_product'].pimage;

// Product form
let productForm = document.querySelector('.product-form');
// Deletion Confirmation
let productDltConfirm = document.querySelector('.product-delete');
// Add product button
let addBtn = document.querySelector('.add-order');

function editProduct(n) {
  document.forms['add_product'].action = 'edit_product.php?p=' + n;
  productForm.style.display = 'flex';
}

function deleteProduct(n) {
  document.forms['delete_product'].action = 'delete_product.php?id=' + n;
  productDltConfirm.style.display = 'flex';
}

$(".bxs-edit-alt").click(function () {
  let result;
  let $row = $(this).closest("tr");
  let $productName = $row.find(".text-left").text();
  let requestProductInfo = new XMLHttpRequest();
  requestProductInfo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.response);
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
  requestProductInfo.open("GET", "product_info.php?p=" + $productName, true);
  requestProductInfo.send();
});

addBtn.addEventListener('click', () => {
  document.forms['add_product'].action = 'add_product.php';
  document.forms['add_product'].reset();
  productForm.style.display = 'flex';
});

//close add product form
let cancelBtn = document.querySelector('.cancel');
cancelBtn.addEventListener('click', () => {
  productForm.style.display = 'none';
})

//product detail
let productDetail = document.querySelector('.product-detail');
let detailBtn = document.getElementsByClassName('bxs-detail');
let closeBtn = document.querySelector('.close');
for (let i = 0; i < detailBtn.length; i++) {
  detailBtn[i].addEventListener('click', () => {
    productDetail.style.display = 'flex';
  });
}
closeBtn.addEventListener('click', () => {
  productDetail.style.display = 'none';
});

//product delete
// let deleteBtn = document.getElementsByClassName('bxs-trash');
// let confirmDeletion = document.querySelector('.confirm');
// let cancelDeletion = document.querySelector('.cancel-deletion');
// for (let i = 0; i < deleteBtn.length; i++) {
//   deleteBtn[i].addEventListener('click', () => {
//     productDltConfirm.style.display = 'flex';
//   });
// }
// confirmDeletion.addEventListener('click', () => {
//   productDltConfirm.style.display = 'none';
// });
// cancelDeletion.addEventListener('click', () => {
//   productDltConfirm.style.display = 'none';
// });

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