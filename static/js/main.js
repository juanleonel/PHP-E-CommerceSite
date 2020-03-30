(function() {


  fetch('menu_ajax.php')
  .then(function(response) {

    return response.json();

  })
  .then(function(myJson) {

      AddItemAtMenu(myJson);


  }).catch(function(error) {

    console.log('Hubo un problema con la petición Fetch:' + error.message);

  });


  AddItemAtMenu = function(data){

      var menu_ = $('#dropdown-menu')[0];

      data.forEach((item, i) => {

        const link_name   = item.category_name;
        const link        = item.category_href;

        let a   = document.createElement('a');
        let li  = document.createElement('li');

        a.title     = link_name;
        a.href      = 'itemlist.php?' + link;
        a.innerHTML = link_name

        li.appendChild(a);

        menu_.append(li);

      });



/*
      for (var d of data)
      {


        if (!contains(clientArray, d.category_name)) {

         clientArray.push(d.category_name);

         updateMenu(d.category_name);

        } else alert("You already have a client by that name!");


      }*/


  };

   updateMenu = function(data)
   {
       var lastKey = clientArray.length-1;
       var li = document.createElement('li');

       var ancla = document.createElement('a');

       ancla.innerHTML = clientArray[lastKey];

       li.appendChild(ancla);

       menu.appendChild(li);
   };

  contains = function (a, obj) {
     for (var i = 0; i < a.length; i++) {
         if (a[i] === obj) {
             return true;
         }
     }
     return false;
   };

})();
