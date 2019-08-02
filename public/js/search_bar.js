window.onload = function(){

  var input = document.querySelector(".input_nav");
  console.log(input);

  var paramBusqueda = document.querySelector(".input_nav").value;
  console.log(paramBusqueda);

  input.onkeyup = function(){
  // input.oninput = function(){
  document.getElementById("articles").innerHTML = "";
    // if(input.value.length > 2){

    fetch("api/resultados_api/" + input.value)
      .then(function(response) {
        // console.log(response)
      return response.json()
      })
      .then(function(information) {
      console.log(information);

      var datalist = document.getElementById("articles");
      // console.log(datalist);

// ************* con datalist
      // for (var i = 0; i < information.length; i++) {
      //   datalist.innerHTML = "";
      //
      //   var nombre = information[i].name;
      //
      //   var option = document.createElement("option");
      //   option.value += nombre;
      //   datalist.append(option);
      // }

  // ************* con div

  for (var i = 0; i < information.length; i++) {
    // datalist.innerHTML = "";

    var href = "/articulo/" + information[i].id;
    var src = "/storage/articulos/" + information[i].image1
    var nombre = information[i].name;

    var layout = `
      <a href='${href}' class= 'a_busqueda'>
        <img class= 'img_busqueda' style="height:30px; width:auto" src='${src}' alt=''>${nombre}
      </a>
      `;

    datalist.innerHTML += (layout);

    // var a = document.createElement("a");
    // a.href += href;
    // datalist.append(a);
    //
    // var img = document.createElement("img");
    // img.src += src;
    // a.innerHTML += img;
    //
    // a.innerText += nombre;

  }

      })
      .catch(function(error) {
      console.log("Error: " + error);
      })


// } cierre if con length

  };


} //cierre onload
