(function() {

    const form = document.getElementById("frmAddCart");

    if (form) {
          
        form.addEventListener("submit", function(event){

            event.preventDefault();

            let url = form.getAttribute("action");

            let iproductoid = document.getElementById("iproductoid").value;
            let quantity = document.getElementById("quantity").value;

            const data = {
                iproductoid : iproductoid,
                quantity : quantity,
                action: "add"
            }

            const information = {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            
            PostFetch(url, information);

        });

    }


    const formEmptyCart = document.getElementById("frmEmptyCart");

    if (formEmptyCart) {
        formEmptyCart.addEventListener("submit", function(event){
            event.preventDefault();

            let url = formEmptyCart.getAttribute("action");
            
            const data = {                
                action: "empty"
            }

            const information = {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            
            PostFetch(url, information, true);

        });
    }
    
    function isEmptyList(){
        return $('#list-products').find('.list__item').length == 0;
    }

    function createPanelEmpty(){
        let panel  = document.createElement('div');
        panel.innerHTML = "Cart Empty";
        panel.setAttribute("id","CartEmpty");
        panel.setAttribute("class", "cart-empty");
        $('.container.marketing .row').prepend(panel);
    }

    function hideGridNarrow(){
        $('.grid--narrow').remove();
        $('#buttons-cart').remove();           
    }

    function Calculate(){
        //$('.list__footer h4').text();
        
        let $products = $('.list--product .list__item');
 
        let total = 0;
        // console.log($products);
        if($products.length != 0){

            $products.each(function (i, p) {
            
                var id = $(p).attr('id');
                $i = $(".list__item#" + id);            
                
                let price = $('input[name$="price"]', $i ).val();            
                let quantity = $('input[name$="quantity"]', $i).val();
                t = price * quantity;
    
                console.log(total);
                 
                $('.subtotal b', $i).text('$' + parseFloat(t).toFixed(2)),
                total += t;
    
              });
    
        }
        

        

          $('.list--product .list__footer h4')
          .text('Sub-Total: $' + parseFloat(total).toFixed(2));

    }

    $(".delete").on("click",  function(event){
        
        event.preventDefault();
        //console.log( $('#list-products').find('.list__item') );
        //console.log($(this).closest('.list__item')[0]);
    
                 
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {

            const data = {      
                iproductoid : document.getElementById("item-code").value,
                action: "delete"
            }
 
            const information = {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            
            if(willDelete){

              
           

                $parent = $(this).closest('.list__item')[0];
        
                $($parent).fadeOut(400,0, function(){
                    $(this).remove();
                });
                 

                setTimeout(function(){

                    if(isEmptyList()){
                        hideGridNarrow();
                        createPanelEmpty();                    
                    }
                    Calculate();


                },800);


        
            }


            // var result = PostFetch('cart.php', information);
            
            // console.log(result);
            
            


            // if (willDelete) {


            //   swal("Poof! Your imaginary file has been deleted!", {
            //     icon: "success",
            //   });
            // } else {
            //  return;
            // }
          });

    });
    

    // change value from input
    $('.list--product .list__item input[name$="quantity"]').on('change', function (e) {
        Calculate();
    });
  
  })();

 
  function PostFetch(url, information, rediredTo = false ){

    fetch(url, information)
    .then(function(response) {

        return response.json();

    })
    .then(function(myJson) {
                     
        if (rediredTo) {                    
            window.location.replace(myJson.route);
            
        }else{
            SetMessageSuccess(myJson.message);

            console.log(myJson);
        }
       
    }).catch(function(error) {

        console.log('Hubo un problema con la petición Fetch:' + error.message);
        SetMessageError('Hubo un problema con la petición Fetch:' + error.message);
        
    });

  }


  

  function SetMessageSuccess(message){
    $('#alertGlobal')
    .append(
    ' <div class="alert alert-success alert-dismissible" role="alert">'
    + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
    + message
    + '</div> ');

    $('#alertGlobal').delay(5000).fadeOut();
  }



  function SetMessageError(message){
    $('#alertGlobal')
    .append(
    ' <div class="alert alert-danger alert-dismissible" role="alert">'
    + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
    + message
    + '</div> ');

    $('#alertGlobal').delay(5000).fadeOut();
  }