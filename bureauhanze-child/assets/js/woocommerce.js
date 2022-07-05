var top1 = false
var bottom = false

function descPress() {
    var description = document.getElementById('description');
    var arrow = document.querySelector(".tab_info");
    top1 = !top1

    if (top1) {
        description.classList.add("showDesc");
        arrow.classList.add("rotateArrow");
    } else {
        arrow.classList.remove("rotateArrow");
        description.classList.remove("showDesc")
    }
}

function extraPress() {
    var description = document.getElementById('additional');
    var arrow = document.querySelector(".tab_info:nth-child(2)");
    bottom = !bottom;

    if (bottom) {
        arrow.classList.add("rotateArrow");
        description.classList.add("showDesc");
    } else {
        arrow.classList.remove("rotateArrow");
        description.classList.remove("showDesc");
    }
}

// Minus and Plus buttons quantity 

jQuery(document).ready(function($){   
          
    $('form.cart').on( 'click', 'button.plus, button.minus', function() {

    // Get current quantity values
    var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
    var val   = parseFloat(qty.val());
    var max = parseFloat(qty.attr( 'max' ));
    var min = parseFloat(qty.attr( 'min' ));
    var step = parseFloat(qty.attr( 'step' ));

    // Change the value if plus or minus
    if ( $( this ).is( '.plus' ) ) {
       if ( max && ( max <= val ) ) {
          qty.val( max );
       } 
    else {
       qty.val( val + step );
         }
    } 
    else {
       if ( min && ( min >= val ) ) {
          qty.val( min );
       } 
       else if ( val > 1 ) {
          qty.val( val - step );
       }
    }
     
 });
  
});


// Ajax quantity add

var timeout;

jQuery( function( $ ) {
	$('.woocommerce').on('change', 'input.qty', function(){

		if ( timeout !== undefined ) {
			clearTimeout( timeout );
		}

		timeout = setTimeout(function() {
			$("[name='update_cart']").trigger("click");
		}, 500 ); // 0.5 second delay    

	} );
} ); 


// Checkout steps

setTimeout(() => {
    var meeBezig = document.getElementById("stap1");
    if (meeBezig) {
        meeBezig.classList.add("active-class");
    }
}, 200);

function nextStepCheckout() {
    var step1_content = document.getElementById("checkout_step1");
    var step2_content = document.getElementById("checkout_step2");

    var afgerond = document.getElementById("stap1");
    var meeBezig = document.getElementById("stap2");

    var lijn1_2 = document.getElementById("tussen1-2");

    lijn1_2.style.width = "100%";
    meeBezig.classList.add("active-class");
    afgerond.classList.add("done-class");

    window.scrollTo(0, 50);

    step1_content.style.display = "none";
    step2_content.style.display = "block";
}

function previousStep() {
    console.log('stap terug')
    var step1_content = document.getElementById("checkout_step1")
    var step2_content = document.getElementById("checkout_step2")

    var stap1 = document.getElementById("stap1")
    var stap2 = document.getElementById("stap2")
    window.scrollTo(0, 0);

    step1_content.style.display = "block";
    step2_content.style.display = "none";

    step1_content.style.display = "block";
    step2_content.style.display = "none";

}


// Open product modal
function productModal(productTitle, productLink, productImgUrl) {
    // gets inner and outer modals
    var theModal = document.getElementById("productModal");
    var theModalInner = document.getElementById("productModalInner");

    // changes the html with the new parameter data inside of it
    document.getElementById('imgWrapper').innerHTML = '<a href="' + productLink + '"><img class="modalProductImage" src="' + productImgUrl + '"/></a>';
    document.getElementById("productTitle").innerHTML = productTitle;

    // adds the active class to the modal
    theModal.classList.add('modal__cart--active');
    // theModalInner.classList.add('product_modal-animation');

    pageOverlay.classList.remove("page-overlay");
    pageOverlay.classList.add("page-overlay--active");
}

// Close product modal
function closeProductModal() {
    // grabs modal by the id and then remove the active class
    var theModal = document.getElementById("productModal");
    theModal.classList.remove('modal__cart--active');

    pageOverlay.classList.remove("page-overlay--active");
    pageOverlay.classList.add("page-overlay");
}