//open add product form
let productForm = document.querySelector('.product-form');
let editBtn = document.getElementsByClassName('bxs-edit-alt');
let addBtn = document.querySelector('.add-order');
for (let i = 0; i < editBtn.length; i++) {
  editBtn[i].addEventListener('click', () => {
    productForm.style.display = 'flex';
  });
}

addBtn.addEventListener('click', () => {
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
let productDltConfirm = document.querySelector('.product-delete');
let deleteBtn = document.getElementsByClassName('bxs-trash');
let confirmDeletion = document.querySelector('.confirm');
let cancelDeletion = document.querySelector('.cancel-deletion');
for (let i = 0; i < deleteBtn.length; i++) {
  deleteBtn[i].addEventListener('click', () => {
    productDltConfirm.style.display = 'flex';
  });
}
confirmDeletion.addEventListener('click', () => {
  productDltConfirm.style.display = 'none';
});
cancelDeletion.addEventListener('click', () => {
  productDltConfirm.style.display = 'none';
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