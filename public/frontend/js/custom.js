$(document).ready(function () {
    loadcart();
    loadwishlist();

    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        // alert(product_id);
        // alert(product_qty);
        $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-car",
            data: {
                'product_id':product_id,
                'product_qty':product_qty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            }
        });
    });

    $('.addToWishlist').click(function (e) { 
        e.preventDefault();
       
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id':product_id,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist();
            }
        });
        
    });

    // $('.increment-btn').click(function (e) { 
        $(document).on('click','.increment-btn', function (e) {

        e.preventDefault();
        
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 :value;
        if(value <10 )
        {
            value ++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // $('.decrement-btn').click(function (e) { 
        $(document).on('click','.decrement-btn', function (e) {

        e.preventDefault();
        
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 :value;
        if(value >1 )
        {
            value --;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    function loadcart()
    {
        $.ajax({
            method: "get",
            url: "/load-cart-data",
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadwishlist()
    {
        $.ajax({
            method: "get",
            url: "/load-wishlist-data",
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
              
            }
        });
    }
     
        
    // $('.delete-cart-item').click(function (e) { 
        $(document).on('click','.delete-cart-item', function (e) {
            
        e.preventDefault();
        
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "post",
            url: "delete-cart-item",
            data: {
                'prod_id' : prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadcart();
                $('.cartitem').load(location.href + " .cartitem");
                swal("",response.status,"success");
            }
        });
    });

    // $('.delete-wishlist-item').click(function (e) { 
        $(document).on('click','.delete-wishlist-item', function (e) {

        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "post",
            url: "delete-wishlist-item",
            data: {
                'prod_id' : prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadwishlist();
                $('.wishlistitem').load(location.href + " .wishlistitem");
                swal("",response.status,"success");
                
            }
        });
        
    });

    // $('.changeQuantity').click(function (e) { 
        $(document).on('click','.changeQuantity', function (e) {

        e.preventDefault();
        
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data =  {
            'prod_id': prod_id,
            'prod_qty': qty,
        }

        $.ajax({
            method : "post",
            url: "update-cart",
            data :data,
            success: function (response) {
                $('.cartitem').load(location.href + " .cartitem");

            //    window.location.reload();
            }
        });
    });

  
    
});
