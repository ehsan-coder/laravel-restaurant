/*global console*/ 

// كود إضافة سطر جديد إلى الجدول (عناصر)

const formEl = document.querySelector("form");
const tbodyEl =  document.querySelector("tbody");
const tableEl =  document.querySelector("table");

function onAddWebsite3(e)
{
    e.preventDefault();
    const menuName = document.getElementById('menu-name').value;
    const itemName = document.getElementById('item-name').value;
    const itemType = document.getElementById('item-type').value;
    const itemImage = document.getElementById('item-image').value;
    const price = document.getElementById('price').value;
    const itemStatus = document.getElementById('item-status').value;
    if(menuName != "" && itemName != "" && itemType != "" && itemImage != "" && price != ""  && itemStatus != "")
    {
    tbodyEl.innerHTML += `
     <tr>
        <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>
        <td>${menuName}</td>
        <td>${itemName}</td>
        <td>${itemType}</td>
        <td>${itemImage}</td>
        <td>${price}$</td>
        <td>${itemStatus}</td>
        <td><button class="btn btn-primary" data-toggle="modal" data-target="#add">Edit</button></td>
        <td><button class="btn btn-danger">Delete</button></td>
     </tr>
     `
    }
    if(menuName == "" || itemName == "" || itemType == "" || itemImage == "" || price == "" || itemStatus == "")
    {
        alert("There are empty fields, please reinput");
    }
}
function onDeleteRow3(e) {
        if (!e.target.classList.contains("btn-danger")) {
        return;
        }
         const btn = e.target;
          btn.closest("tr").remove();
        }

        formEl.addEventListener("submit",onAddWebsite3);
        tableEl.addEventListener("click", onDeleteRow3);


// كود إضافة سطر جديد إلى الجدول ( عروض )

function onAddWebsite5(e)
{

    e.preventDefault();
    const offerName = document.getElementById('offer-name').value;
    const offerPrice = document.getElementById('offer-price').value;
    const startDate = document.getElementById('start-date').value;
    const validDate = document.getElementById('valid-date').value;
    const numOfItems = document.getElementById('num-of-items').value;
    const offerStatus = document.getElementById('offer-status').value;
    if(offerName != "" && offerPrice != "" && startDate != "" && validDate != "" && numOfItems != "" && offerStatus != "")
    {
    tbodyEl.innerHTML += `
     <tr>
        <td><input type="checkbox" name="checkbox" class="form-control" id="checkbox"/></td>
        <td>${offerName}</td>
        <td>${offerPrice}</td>
        <td>${startDate}</td>
        <td>${validDate}</td>
        <td>${numOfItems}</td>
        <td>${offerStatus}</td>
        <td><button class="btn btn-primary"  data-toggle="modal" data-target="#add">Edit</button></td>
        <td><button class="btn btn-danger">Delete</button></td>
     </tr>
     `
}
if(offerName == "" || offerPrice == "" || startDate == "" || validDate == "" || numOfItems == "" || offerStatus == "")
    {
        alert("There are empty fields, please reinput");
    }
}
function onDeleteRow5(e) {
        if (!e.target.classList.contains("btn-danger")) {
        return;
        }
         const btn = e.target;
          btn.closest("tr").remove();
        }

        formEl.addEventListener("submit",onAddWebsite5);
        tableEl.addEventListener("click", onDeleteRow5);


