window.onload = function(){

  var input = document.querySelector(".input_nav");
  console.log(input);

  var paramBusqueda = document.querySelector(".input_nav").value;
  console.log(paramBusqueda);

  input.onkeyup = function(){
  // input.oninput = function(){
    if(input.value.length > 2){

    fetch("api/resultados_api/" + input.value)
      .then(function(response) {
        // console.log(response)
      return response.json()
      })
      .then(function(information) {
      console.log(information);

      var datalist = document.getElementById("articles");
      // console.log(datalist);
// *************
      for (var i = 0; i < information.length; i++) {
        datalist.innerHTML = "";

        var nombre = information[i].name;

        var option = document.createElement("option");
        option.value += nombre;
        datalist.append(option);
      }


  // *************
      // var option = datalist.querySelector("option");

      // for (var i = 0; i < information.length; i++){
      //   nuevoOption = option.cloneNode(true);
      //   datalist.append(nuevoOption);
      //
      //   option.value = information[i].name
      //   var img = option.querySelector("img");
      //   img.setAttribute("src", "/storage/articulos/" + information[i].image1);
      //   var a = option.querySelector("a");
      //   a.setAttribute("href", "/articulo/" + information[i].id);
      //
      // }

      })
      .catch(function(error) {
      console.log("Error: " + error);
      })


}

  };


} //cierre onload
