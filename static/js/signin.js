(function() {

    const form = document.getElementById("frmSigin");

     
    form.addEventListener("submit", function(event){

        event.preventDefault();

        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        const data = {
            email : email,
            password : password
        }

        const information = {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json'
              },
            body: JSON.stringify(data)
        }
        
        fetch('validateuser_ajax.php', information)
        .then(function(response) {
    
            return response.json();
    
        })
        .then(function(myJson) {
                        
            window.location.href = myJson.route;
    
        }).catch(function(error) {
    
            console.log('Hubo un problema con la petición Fetch:' + error.message);
    
        });

    });




    


    
  
    
    
  
  })();
  