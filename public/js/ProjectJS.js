
// // JQuery
// $(document).ready(function()
// {
//     $(".loader-container").fadeOut(4000);
// });


// // كود تحميل صورة إلى الجدول

// window.addEventListener('load',function(){

//     document.querySelector('input[type="file"]').addEventListener('change',function()
//     {
//         if(this.files && this.files[0])
//         {
//         var img = document.querySelector('myImg');
//         img.src=URL.createObjectURL(this.files[0]);
//         img.onload = imageIsLoaded;
//         }
//     })
// })

// function imageIsLoaded(e)
// {
//     alert(e);
// }

// // كود إضافة سطر جديد إلى الجدول (وجبات)
// const formEl = document.querySelector("form");
// const tbodyEl =  document.querySelector("tbody");
// const tableEl =  document.querySelector("table");
// const Orders = document.querySelector("single-order")

// function onAddWebsite(e)
// {
//     e.preventDefault();
//     const category = document.getElementById('category').value;
//     const name = document.getElementById('name').value;
//     const ingredients = document.getElementById('ingredients').value;
//     const myImg = document.getElementById('image').value;
//     const status = document.getElementById('status').value;
//     if(category != "" && name != "" && ingredients != "" && myImg != "" && status != "")
//     {
//     tbodyEl.innerHTML += `
//      <tr>
//         <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>
//         <td>${category}</td>
//         <td>${name}</td>
//         <td>${ingredients}</td>
//         <td>${myImg}</td>
//         <td>${status}</td>
//         <td><button class="btn btn-primary"  data-toggle="modal" data-target="#add">Edit</button></td>
//         <td><button class="btn btn-danger">Delete</button></td>
//      </tr>
//      `
//     }
// }
// function onDeleteRow(e) {
//         if (!e.target.classList.contains("btn-danger")) {
//         return;
//         }
//          const btn = e.target;
//           btn.closest("tr").remove();
//         }

// formEl.addEventListener("submit",onAddWebsite);
// tableEl.addEventListener("click",onDeleteRow);



// // كود إضافة سطر جديد إلى الجدول (مستخدمين)


// function onAddWebsite2(e)
// {

//     e.preventDefault();
//     const username = document.getElementById('username').value;
//     const email = document.getElementById('email').value;
//     const phone = document.getElementById('phone').value;
//     const refferal = document.getElementById('refferal').value;
//     const userstatus = document.getElementById('userstatus').value;
//     if(username != "" && email != "" && phone != "" && refferal != "" && userstatus != "")
//     {
//     tbodyEl.innerHTML += `
//      <tr>
//         <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>
//         <td>${username}</td>
//         <td>${email}</td>
//         <td>${phone}</td>
//         <td>${refferal}</td>
//         <td>${userstatus}</td>
//         <td><button class="btn btn-primary"  data-toggle="modal" data-target="#add">Edit</button></td>
//         <td><button class="btn btn-danger">Delete</button></td>
//      </tr>
//      `
// }
// }
// function onDeleteRow2(e) {
//         if (!e.target.classList.contains("btn-danger")) {
//         return;
//         }
//          const btn = e.target;
//           btn.closest("tr").remove();
//         }

//         formEl.addEventListener("submit",onAddWebsite2);
//         tableEl.addEventListener("click", onDeleteRow2);

//  // كود إضافة سطر جديد إلى الجدول (items)


// function onAddWebsite3(e)
// {

//     e.preventDefault();
//     const menuName = document.getElementById('menu-name').value;
//     const itemName = document.getElementById('item-name').value;
//     const itemType = document.getElementById('item-type').value;
//     const itemImage = document.getElementById('item-image').value;
//     const itemPrice = document.getElementById('price').value;
//     const itemStatus = document.getElementById('item-status').value;
//     if(menuName != "" && itemName != "" && itemType != "" && itemImage != "" && itemPrice != "" && itemStatus != "")
//     {
//     tbodyEl.innerHTML += `
//      <tr>
//         <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>   
//         <td>${menuName}</td>
//         <td>${itemName}</td>
//         <td>${itemType}</td>
//         <td>${itemImage}</td>
//         <td>${itemPrice}$</td>
//         <td>${itemStatus}</td>
//         <td><button class="btn btn-primary"  data-toggle="modal" data-target="#add">Edit</button></td>
//         <td><button class="btn btn-danger">Delete</button></td>
//      </tr>
//      `
// }
// }
// function onDeleteRow3(e) {
//         if (!e.target.classList.contains("btn-danger")) {
//         return;
//         }
//          const btn = e.target;
//           btn.closest("tr").remove();
//         }

//         formEl.addEventListener("submit",onAddWebsite3);
//         tableEl.addEventListener("click", onDeleteRow3);

// // كود إضافة سطر جديد إلى الجدول (offers)


// function onAddWebsite4(e)
// {

//     e.preventDefault();
//     const offerName = document.getElementById('offer-name').value;
//     const offerPrice = document.getElementById('offer-price').value;
//     const startDate = document.getElementById('start-date').value;
//     const validDate = document.getElementById('valid-date').value;
//     const numOfItems = document.getElementById('num-of-items').value;
//     const offerStatus = document.getElementById('offer-status').value;
//     if(offerName != "" && offerPrice != "" && startDate != "" && validDate != "" && numOfItems != "" && offerStatus != "")
//     {
//     tbodyEl.innerHTML += `
//      <tr>
//         <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>
//         <td>${offerName}</td>
//         <td>${offerPrice}$</td>
//         <td>${startDate}</td>
//         <td>${validDate}</td>
//         <td>${numOfItems}</td>
//         <td>${offerStatus}</td>
//         <td><button class="btn btn-primary"  data-toggle="modal" data-target="#add">Edit</button></td>
//         <td><button class="btn btn-danger">Delete</button></td>
//      </tr>
//      `
// }
// }
// function onDeleteRow4(e) {
//         if (!e.target.classList.contains("btn-danger")) {
//         return;
//         }
//          const btn = e.target;
//           btn.closest("tr").remove();
//         }

//         formEl.addEventListener("submit",onAddWebsite4);
//         tableEl.addEventListener("click", onDeleteRow4);

//  // كود إضافة طلب جديد إلى الجدول (Orders)


// function onAddWebsite5(e)
// {

//     e.preventDefault();
//     const orderNumber = document.getElementById('order-number').value;
//     const oName = document.getElementById('order-name').value;
//     const oPhone = document.getElementById('order-phone').value;
//     const oLocation = document.getElementById('order-location').value;
//     const oContent = document.getElementById('order-content').value;
//     const oPrice = document.getElementById('order-price').value;
//     const oStatus = document.getElementById('order-status').value;
    
   
//     Orders.innerHTML += `
//      <h2>${orderNumber}</h2>
//      `

// }
// function onDeleteRow5(e) {
//         if (!e.target.classList.contains("btn-danger")) {
//         return;
//         }
//          const btn = e.target;
//           btn.closest("tr").remove();
//         }

//         formEl.addEventListener("submit",onAddWebsite5);
//         tableEl.addEventListener("click", onDeleteRow5);

// // Animation For Loader



