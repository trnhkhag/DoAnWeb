if (localStorage.getItem('isLoggedIn') == 'true') {
  $(document).on('click', '.btn-buynow', function (e) {
    e.preventDefault();
    var parent = $(this).parents('.product');
    var src = parent.find('img').attr('src');
    var cart = $(document).find('#cart');
    var top = parent.offset().top;
    var left = parent.offset().left;
    $('<img />', {
      class: 'product-img',
      src: src
    }).appendTo('body').css({
      'top': top,
      'left': left
    });
    setTimeout(function () {
      $(document).find('.product-img').css({
        'top': cart.offset().top,
        'left': cart.offset().left
      });
      setTimeout(function () {
        $(document).find('.product-img').remove();


      }, 1000);
    }, 500);

  })

  const btn = document.querySelectorAll('.btn-buynow');
  let products = [
    {
      name: 'LOBINNI',
      Image: 'product_1',
      price: 22750,
      incart: 0,

    },
    {
      name: 'TENITOP',
      Image: 'product_2',
      price: 20000,
      incart: 0,

    },
    {
      name: 'HAZEAL',
      Image: 'product_3',
      price: 20000,
      incart: 0,

    },
    {
      name: 'MINI-FOCUS',
      Image: 'product_4',
      price: 20000,
      incart: 0,

    },
    {
      name: 'DATEJUST',
      Image: 'product_5',
      price: 20000,
      incart: 0,

    },
    {
      name: 'EXPLORER',
      Image: 'product_10',
      price: 20000,
      incart: 0,

    },
    {
      name: 'OYSTER PERPETUAL',
      Image: 'product_7',
      price: 20000,
      incart: 0,

    },
    {
      name: 'YACHT-MASTER',
      Image: 'product_8',
      price: 20000,
      incart: 0,

    },
    {

      name: 'SKY-DWELLER',
      Image: 'product_9',
      price: 20000,
      incart: 0,

    },
    {
      name: 'LADY-DATEJUST',
      Image: 'product_10',
      price: 20000,
      incart: 0,

    },
    {
      name: 'MILGAUSS',
      Image: 'product_11',
      price: 20000,
      incart: 0,

    },
    {
      name: 'CELLINI',
      Image: 'product_12',
      price: 20000,
      incart: 0,
    },
  ];

  for (let index = 0; index < btn.length; index++) {
    btn[index].addEventListener('click', () => {
      cartNumber(products[index]);
      totalcost(products[index]);
    })
  }


  function onloadcart() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if (productNumbers) {
      document.querySelector('#cart span').textContent = productNumbers;
    }
  }

  function cartNumber(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
      localStorage.setItem('cartNumbers', productNumbers + 1);
      document.querySelector('#cart span').textContent = productNumbers + 1;
    } else {
      localStorage.setItem('cartNumbers', 1);
      document.querySelector('#cart span').textContent = 1;
    }
    setItem(product);
  }
  onloadcart();
  function setItem(product) {
    let cartItem = localStorage.getItem('productsincart');
    cartItem = JSON.parse(cartItem);
    if (cartItem != null) {
      if (cartItem[product.name] == undefined) {
        cartItem = {
          ...cartItem,
          [product.name]: product
        }
      }
      cartItem[product.name].incart += 1;
    } else {
      product.incart = 1;
      cartItem = {
        [product.name]: product
      }
    }
    localStorage.setItem('productsincart', JSON.stringify(cartItem));
  }
  function totalcost(product) {
    let cartcost = localStorage.getItem('totalcost');
    if (cartcost != null) {
      cartcost = parseInt(cartcost);

      localStorage.setItem('totalcost', cartcost + product.price);
    } else {
      localStorage.setItem('totalcost', product.price);

    }
  }
  function displaycart() {
    let cartItem = localStorage.getItem('productsincart');
    cartItem = JSON.parse(cartItem);
    let productcontainer = document.querySelector(".bodyofcart");

    if (cartItem && productcontainer) {
      productcontainer.innerHTML = '';
      Object.values(cartItem).map(item => {

        productcontainer.innerHTML += `
                <tr>
                <td class="product-remove"><input type="checkbox" id="buy" name="watch02"
                      value="buy"></td>
  
                <td class="image-prod" >
                   <img style="height:250px" src="images/${item.Image}.jpg">
                   </div>
                </td>
  
                <td class="product-name">
                   <p style="font-size:30px;font-weight:bold;">${item.name}</p>
                   <p class="price" style="font-size:20px">$${item.incart * item.price},00</p>
                   <div class="cart_quantity">
                      <span style="font-size:20px">Quantity: </span>
                      <input type="text" name="quantity"
                         class="quantity cart_quantity_input input-number" value="${item.incart}" min="1"
                         max="100">
  
                   </div>
                
  
                </td>
                <td>
                <button onclick="deleteproducts(this)" style="padding:0 10px; background-color:#ffad33;border-radius:0.355rem;" ><span class="ion-ios-close"></span></button>
                
             </tr>
  
            
                `
      })
    }
  }
  displaycart();

  function deleteproducts(x) {
    var tr = x.parentElement.parentElement;
    tr.remove();

  }
}