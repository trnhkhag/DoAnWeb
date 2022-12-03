let wishlist = document.querySelectorAll('.add-wishlist');

let products = [
    {
        name:'LOBINNI',
        Image:'product_1',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 22750,

    },
    {
        name:'TENITOP',
        Image:'product_2',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'HAZEAL',
        Image:'product_3',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'MINI-FOCUS',
        Image:'product_4',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'DATEJUST',
        Image:'product_5',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'EXPLORER',
        Image:'product_6',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'OYSTER PERPETUAL',
        Image:'product_7',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'YACHT-MASTER',
        Image:'product_8',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
    
        name:'SKY-DWELLER',
        Image:'product_9',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,
    },
    {
        name:'LADY-DATEJUST',
        Image:'product_10',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'MILGAUSS',
        Image:'product_11',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
    {
        name:'CELLINI',
        Image:'prodduct_12',
        tag:'Far far away, behind the word mountains, far from the countries',
        price: 20000,

    },
];

for(let i=0;i<wishlist.length;i++){
    wishlist[i].addEventListener('click',() =>{
        wishlistNumbers(products[i]);
    })
}

function onLoadWishListNumber(){
    let productNumbers = localStorage.getItem('wishlistNumbers');

}

function wishlistNumbers(product){
    let productNumbers = localStorage.getItem('wishlistNumbers');

    productNumbers = parseInt(productNumbers);

    if(productNumbers){
        localStorage.setItem('wishlistNumbers', productNumbers + 1);
    }
    else{
        localStorage.setItem('wishlistNumbers',1);
    }
    setItems(product);
}

function setItems(product){
    let wishlistItem = localStorage.getItem('productInWishList');
    wishlistItem = JSON.parse(wishlistItem);
    
    if(wishlistItem !=null){

        if(wishlistItem[product.name] == undefined ){
            wishlistItem = {
                ...wishlistItem,
                [product.name]:product
            }
        }
          wishlistItem[product.name].product +=1;
    }
    else{
         wishlistItem ={
        [product.name]: product
    }
    }
   

    localStorage.setItem("productInWishList",JSON.stringify( wishlistItem));
}

function displayWishList(){
    let wishlistItem = localStorage.getItem('productInWishList');
    wishlistItem = JSON.parse(wishlistItem);
    let wishlistContainer = document.querySelector(".wishlist-container");

    console.log(wishlistItem)
    if(wishlistItem && wishlistContainer){
        wishlistContainer.innerHTML = '';
        Object.values(wishlistItem).map(item =>
            {
                
                wishlistContainer.innerHTML += `
                <div class "wishlist-table">
                <tr>
                <td class="product-remove">
                <button class="wishlistDelete" onclick="DeleteWishList(this)"><span class="ion-ios-close"></span></button>

				<td class="image-prod">
				<img class="img" src="images/${item.Image}.jpg">
				</td>
				<td class="product-name">
                <h3>${item.name}</h3>
				<p>${item.tag}</p>
				</td>
				<td class="price">$${item.price}.00</td>
                </tr>
                </div>
                
                `
            })
    }
}

function DeleteWishList(x){
    var tr= x.parentElement.parentElement;
    tr.remove();
}



onLoadWishListNumber();
displayWishList();

