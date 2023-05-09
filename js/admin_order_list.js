let orderFormContainer = document.querySelector('.order-form');
let orderForm = document.forms["order-form"];
let addBtn = document.querySelector('.add-order');
// Order form properties
let customerName = orderForm.customer;
let customerPhone = orderForm.cphone;
let orderTotal = orderForm.total;
let orderStatus = orderForm.status;
let orderDate = orderForm.date;

addBtn.addEventListener('click', () => {
  orderFormContainer.style.display = 'flex';
});

function editOrder(n) {
  orderForm.action = 'edit_order.php?oid=' + n;
  orderFormContainer.style.display = 'flex';
  let requestOrderInfo = new XMLHttpRequest();
  requestOrderInfo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.response);
      customerName.value = result["HoTen"];
      customerPhone.value = result["DienThoai"];
      orderTotal.value = result["ThanhTien"];
      orderStatus.value = result["TrangThai"];
      orderDate.value = result["NgayLap"];
    }
  }
  requestOrderInfo.open('POST', 'order_info.php?p=' + n, true);
  requestOrderInfo.send();
}

$('.cancel').click(function () {
  orderFormContainer.style.display = 'none';
});

window.onclick = (e) => {
  if (e.target == orderFormContainer) {
    orderFormContainer.style.display = 'none';
  }
}