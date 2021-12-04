@extends('customer.main')

@section('content')

<input id="u_id" type="text" value="{{Auth::user()->id}}">
<!-- Start Menu -->
<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".breakfast">Breakfast</button>
							<button data-filter=".lunch">Lunch</button>
							<button data-filter=".dinner">Dinner</button>
							<button data-filter=".pizza">Pizza</button>
							<button data-filter=".desserts">Desserts</button>
							<button data-filter=".drinks">Drinks</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
                <div class="shop-items">
			        {{--  --}}
					
		
                </div>
			</div>


		</div>
	</div>
<!-- Ready List -->
    <h1 class="Purchase-title"  id="purchase"><i class="fas fa-shopping-cart shop-cart-icon"></i>Purchase Cart<i class="fas fa-shopping-cart shop-cart-icon"></i></h2>
    <section class="container content-section">
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            
			<div class="cart-items">
				{{-- put carts here --}}
{{-- 				
				<div style="display: flex; padding-bottom:10px;">
					<img style="width:120px; height:120px;" src="{{asset('images/1629975709.jpg')}}">
					<p>itam name</p>
				<span style="padding-left: 320px">
					price
				</span>
				<span style="padding-left: 190px">
				<input type="number" class="cart-quantity-input" value="1">
				<button class="btn btn-danger">Remove</button>
				<span>
			    </div> --}}

            </div>

            <div class="cart-total">
                <strong class="cart-total-title">Total = </strong>
                {{-- <span class="cart-total-price">$</span> --}}
            </div>

			<input type="hidden" id="totalprice">
            <button id="order_id" class="btn btn-danger btn-purchase" type="button">PURCHASE</button>
        </section>
	<!-- End Menu -->




	<script>
		
function allData(){
      
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "{{route('c_getitem')}}",
          success:function(response){
            // console.log(response); 	

		
            var data = "";
			var userId = $('#u_id').val();
		
			
            $.each(response , function(key , value){
			
				data += "<div class='col-lg-4 col-md-6 special-grid'>"
				data += "<div class='shop-item'>"
				data += "<div class='gallery-single fix'>"
				data += "<img id='image' class='shop-item-image' src='/images/"+value.image+"' class='img-fluid' alt='Image'>"
				data += "<div class='why-text'>"
				data += "<h4 id='name' class='shop-item-title'>"+value.name+"</h4>"
				data += "<p id='description'>"+value.description+"</p>"
				data += "<h5 id='price' class='shop-item-price'>"+value.price+"</h5>"
				data += "</div>"
				data += "</div>"
				// data += "<button type='button' class='Add-cart btn btn-success shop-item-button'>Add to cart</button>"
			
				data += "<a href='/customer/cart/add-to/"+value.id+"/"+userId+"'>Add To</a>"
				data += "</div>"
				data += "</div>"
			})
			$('.shop-items').html(data);
			
		
			
		}
	})
	
  }

allData();
 // end display


// display carts
function getCarts(){

	var userId = $('#u_id').val();

	$.ajax({
		type: "get",
		url: "/customer/carts/getAll/"+userId,

		success: function (response) {
		//    console.log(response[1][0].amount);
//       
	$('#order_id').val(response[1][0].order_id);

			var data = "";
			var total_price = 0;



	// 		<a href="#" onclick="return false;" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a>
    //  <a href="#" onclick="return false;" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>

			for (let i = 0; i < response[0].length; i++) {
				// c++;
				data += "<div class='cart-item cart-column'>"
				data += "<img class='cart-item-image' src='/images/"+response[0][i][0].image+"' style='height:'100'; width:'100';'>"
				data += "<p class='cart-item-title'>"+response[0][i][0].name+"</p>"
				data += "<span class='cart-price2 cart-column'>"+response[0][i][0].price+"</span>"
				data += "<span class='cart-quantity2 cart-column'>"
				data += "<input type='number' class='amount' value='1'>"
				data += "<i onclick='testup("+response[1][i].id+")' class='quantity-btn quantity-input-up fa fa-angle-up'></i>"
				data += "<i onclick='testdown("+response[1][i].id+")' class='quantity-btn quantity-input-down fa fa-angle-down'></i>"
				data += "<a href='/customer/cart/delete/"+response[1][i].id+"'><button class='btn btn-danger'>Remove</button></a>"
				data += "</span>"
				data += "</div>"
				total_price+=response[0][i][0].price*response[1][i].amount;
			}
			$('.cart-items').html(data);

			$('#totalprice').val(total_price);
		

			
			var ttpp = "<span class='cart-total-price'>$"+total_price+"</span>"
			$('.cart-total').html(ttpp);

		}
	});
}
getCarts();



$('#order_id').on('click', function () {
	
	// console.log($('#order_id').val());
var fm =$('#order_id').val();
var ah =$('#totalprice').val();

	$.ajax({
		
		url: "/customer/order/shop/"+fm,
		data: {tp:ah},
	
		success: function (response) {
			console.log(response);
			location.reload();
		}
	});
});


// $('.amount').on('click',function () { 
	var num = $('.amount').val();
	console.log(num);
//  });


function testup(cart_id) {
	
 var old = Number($('.amount').val());
 var add = old+1;
$('.amount').val(add);
console.log("up");

$.ajax({
	type: "post",
	url: "/customer/cart/amount/"+cart_id,
	data:{newamount:add},
	success: function (response) {
		console.log(response);	
	}
});

 }
 function testdown(cart_id) { 
$('.amount').val(($('.amount').val()-1));



console.log("down");
 }


	</script>
@endsection