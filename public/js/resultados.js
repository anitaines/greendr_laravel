// window.onload = function(){

// FILTRANDO RESULTADOS BUSQUEDA

// SI VUELVO A CLICKEAR, COMO DOY MARCHA ATRAS?
// SI NO HAY RESULTADOS PARA UN FILTRO PERO SI PARA OTRO, COMO PONGO CARTEL "NO HAY RESULTADOS"?
// COMO SUMO O RESTO RESULTADOS?

// <h3 class="h3_resultados">{{$param}}</h3>
var paramBusqueda = document.querySelector(".h3_resultados").innerText;
console.log(paramBusqueda);

var checkboxAll = document.getElementById("resultados_all");
var checkboxName = document.getElementById("resultados_name");
var checkboxNomenclature = document.getElementById("resultados_nomenclature");

checkboxAll.onclick = function (){
// console.log("capturé el checkbox");
if (checkboxAll.hasAttribute("checked")){
  checkboxAll.checked = true;
}else{
  location.href = "/resultados?search=" + paramBusqueda;
}
}

checkboxName.onclick = function (){
// console.log("capturé el checkbox");
 filterName(paramBusqueda);
 checkboxAll.removeAttribute("checked");
}

checkboxNomenclature.onclick = function (){
// console.log("capturé el checkbox");
 filterNomenclature(paramBusqueda);

 // PROBABLEMENTE TENGA QUE PONER UN IF REMOVE
 checkboxAll.removeAttribute("checked");
}

} //cierre onload

function filterName(param){
fetch("api/resultados_api/" + param)
  .then(function(response) {
    // console.log(response)
  return response.json()
  })
  .then(function(information) {
  console.log(information);

  // <div class="resultados_resultados">
  var div = document.querySelector(".resultados_resultados");
  // console.log(div);
  var articulo = div.querySelector(".product_editarMisArticulos");
  // console.log(articulo);
  div.innerHTML = "";

  for (var i = 0; i < information.length; i++){
    nuevoArticulo = articulo.cloneNode(true);
    div.append(nuevoArticulo);

    var a = nuevoArticulo.querySelector("a");
    // console.log(a);
    var img = nuevoArticulo.querySelector("img");
    // console.log(img);
    var h3 = nuevoArticulo.querySelector("h3");
    // console.log(h3);
    var h2 = nuevoArticulo.querySelector("h2");
    // console.log(h2);

    // element.setAttribute(attributename, attributevalue)
    a.setAttribute("href", "/articulo/" + information[i].id);
    img.setAttribute("src", "/storage/articulos/" + information[i].image1);

    switch (information[i].category_id) {
      case 1: h3.innerText = "PLANTA";
      break;
      case 2: h3.innerText = "ESQUEJE";
      break;
      case 3: h3.innerText = "SEMILLAS";
      break;
      case 4: h3.innerText = "PRODUCTO";
      break;
      case 5: h3.innerText = "SERVICIO";
      break;
    }

    // h3.innerText = information[i].category_id;
    h2.innerText = information[i].name;
    // console.log(h3, h2);
    //
    // div.append(articulo);

    //
    // var href = "/articulo/" + information[i].id;
    // var src = "/storage/articulos/" + information[i].image1;
    // var categoria = information[i].category_id;
    // var nombre = information[i].name;
    //
    // a.href += href;
    // img.src += src;
    // h3.innerText += categoria;
    // h3.innerText += nombre;
    //
    // // articulo.append();
    // // div.append(a, img, h3, h2);
    // div.append(articulo);

  }

  })
  .catch(function(error) {
  console.log("Error: " + error);
  })
}

function filterNomenclature(param){
fetch("api/resultados_nomenclature_api/" + param)
// api/resultados?search={param1}&cat={param2}
  // fetch("api/resultados?search=" + param1 + "&cat=" + param2)
  .then(function(response) {
    // console.log(response)
  return response.json()
  })
  .then(function(information) {
  console.log(information);

  // <div class="resultados_resultados">
  var div = document.querySelector(".resultados_resultados");
  // console.log(div);
  var articulo = div.querySelector(".product_editarMisArticulos");
  // console.log(articulo);
  div.innerHTML = "";
  // if (checkboxName.hasAttribute("checked") != true){
  // div.innerHTML = "";
  // }

  for (var i = 0; i < information.length; i++){
    nuevoArticulo = articulo.cloneNode(true);
    div.append(nuevoArticulo);

    var a = nuevoArticulo.querySelector("a");
    // console.log(a);
    var img = nuevoArticulo.querySelector("img");
    // console.log(img);
    var h3 = nuevoArticulo.querySelector("h3");
    // console.log(h3);
    var h2 = nuevoArticulo.querySelector("h2");
    // console.log(h2);

    // element.setAttribute(attributename, attributevalue)
    a.setAttribute("href", "/articulo/" + information[i].id);
    img.setAttribute("src", "/storage/articulos/" + information[i].image1);

    switch (information[i].category_id) {
      case 1: h3.innerText = "PLANTA";
      break;
      case 2: h3.innerText = "ESQUEJE";
      break;
      case 3: h3.innerText = "SEMILLAS";
      break;
      case 4: h3.innerText = "PRODUCTO";
      break;
      case 5: h3.innerText = "SERVICIO";
      break;
    }

    // h3.innerText = information[i].category_id;
    h2.innerText = information[i].name;
    // console.log(h3, h2);
    //
    // div.append(articulo);

    //
    // var href = "/articulo/" + information[i].id;
    // var src = "/storage/articulos/" + information[i].image1;
    // var categoria = information[i].category_id;
    // var nombre = information[i].name;
    //
    // a.href += href;
    // img.src += src;
    // h3.innerText += categoria;
    // h3.innerText += nombre;
    //
    // // articulo.append();
    // // div.append(a, img, h3, h2);
    // div.append(articulo);

  }

  })
  .catch(function(error) {
  console.log("Error: " + error);
  })
// }
