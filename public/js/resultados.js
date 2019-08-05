// window.onload = function(){

// FILTRANDO RESULTADOS BUSQUEDA

// CARTEL "NO HAY RESULTADOS"?


// <h3 class="h3_resultados">{{$param}}</h3>
var paramBusqueda = document.querySelector(".h3_resultados").innerText;
console.log(paramBusqueda);

var checkboxAll = document.getElementById("resultados_all");
var checkboxName = document.getElementById("resultados_name");
var checkboxNomenclature = document.getElementById("resultados_nomenclature");
console.log(checkboxNomenclature);

var categorias_all = document.getElementById("categorias_all");
var checkboxPlanta = document.getElementById("planta");
var checkboxEsqueje = document.getElementById("esqueje");
var checkboxSemillas = document.getElementById("semillas");
var checkboxProducto = document.getElementById("producto");
var checkboxServicio = document.getElementById("servicio");

var checkboxUsuario = document.getElementById("username");


//SIN FILTRAR RESULTADOS
checkboxAll.onclick = function (){
// console.log("capturé el checkbox");
if (checkboxAll.hasAttribute("checked")){
  checkboxAll.checked = true;
}else{
  location.href = "/resultados?search=" + paramBusqueda;
}
}

//BUSCANDO EN TODAS LAS CATEGORIAS
categorias_all.onclick = function (){
// console.log("capturé el checkbox");
if (categorias_all.hasAttribute("checked")){
  categorias_all.checked = true;
}else{
  if(checkboxName.checked == true){
    var nombre = paramBusqueda;
  }else{
    var nombre = false;
  }
  if(checkboxNomenclature.checked == true){
    var nCientifico = paramBusqueda;
  }else{
    var nCientifico = false;
  }
  if(nombre == false && nCientifico == false){
    nombre = paramBusqueda;
    nCientifico = paramBusqueda;
  }
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;

   filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

   checkboxPlanta.checked = false;
   checkboxEsqueje.checked = false;
   checkboxSemillas.checked = false;
   checkboxProducto.checked = false;
   checkboxServicio.checked = false;

   checkboxUsuario.removeAttribute("checked");
   checkboxUsuario.checked = false;

   // checkboxAll.removeAttribute("checked");

}
}

//FILTRANDO POR NOMBRE
checkboxName.onclick = function (){
// console.log(checkboxName.checked);
console.log(checkboxName.checked);
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(categorias_all.checked == true){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
}else{
if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);
 checkboxAll.removeAttribute("checked");

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;

 // var resultado = filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);
 // if(!resultado){
 //   console.log("ups");
 //   var ups = `
 //     <h4>No hay resultados para tu búsqueda.</h4>
 //     `;
 //     var div = document.querySelector(".resultados_resultados");
 //   div.innerHTML = (ups);
 // }
}


//FILTRANDO POR NOMBRE CIENTIFICO
checkboxNomenclature.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(categorias_all.checked == true){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
}else{
if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}

//FILTRANDO POR CATEGORIA "PLANTA"
checkboxPlanta.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");
 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}

//FILTRANDO POR CATEGORIA "ESQUEJE"
checkboxEsqueje.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");
 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}

//FILTRANDO POR CATEGORIA "SEMILLAS
checkboxSemillas.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");
 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}

//FILTRANDO POR CATEGORIA "PRODUCTO"
checkboxProducto.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");
 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}


//FILTRANDO POR CATEGORIA "SERVICIO"
checkboxServicio.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxName.checked == true){
  var nombre = paramBusqueda;
}else{
  var nombre = false;
}
if(checkboxNomenclature.checked == true){
  var nCientifico = paramBusqueda;
}else{
  var nCientifico = false;
}
if(nombre == false && nCientifico == false){
  nombre = paramBusqueda;
  nCientifico = paramBusqueda;
}

if(checkboxPlanta.checked == true){
  var cat1 = 1;
}else{
  var cat1 = false;
}
if(checkboxEsqueje.checked == true){
  var cat2 = 2;
}else{
  var cat2 = false;
}
if(checkboxSemillas.checked == true){
  var cat3 = 3;
}else{
  var cat3 = false;
}
if(checkboxProducto.checked == true){
  var cat4 = 4;
}else{
  var cat4 = false;
}
if(checkboxServicio.checked == true){
  var cat5 = 5;
}else{
  var cat5 = false;
}

if(cat1 == false && cat2 == false && cat3 == false && cat4 == false && cat5 == false){
  var cat1 = 1;
  var cat2 = 2;
  var cat3 = 3;
  var cat4 = 4;
  var cat5 = 5;
  categorias_all.checked = true;
}

 filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5);

 checkboxAll.removeAttribute("checked");
 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxUsuario.removeAttribute("checked");
 checkboxUsuario.checked = false;
}

// FILTRANDO POR USUARIO
checkboxUsuario.onclick = function (){
// console.log("capturé el checkbox");
if(checkboxUsuario.checked == true){

 filterUser(paramBusqueda);

 checkboxAll.removeAttribute("checked");

 categorias_all.removeAttribute("checked");
 categorias_all.checked = false;

 checkboxName.checked = false;
 checkboxNomenclature.checked = false;

 checkboxPlanta.checked = false;
 checkboxEsqueje.checked = false;
 checkboxSemillas.checked = false;
 checkboxProducto.checked = false;
 checkboxServicio.checked = false;
}else{
  location.href = "/resultados?search=" + paramBusqueda;
}
}

// } //cierre onload

// localhost:8000/api/resultados?name=p&nomenclature=p&planta=1&esqueje=2&semillas=false&producto=false&servicio=false

function filter(nombre, nCientifico, cat1, cat2, cat3, cat4, cat5){
fetch("api/resultados?name=" + nombre + "&nomenclature=" + nCientifico + "&planta=" + cat1 +  "&esqueje=" + cat2 + "&semillas=" + cat3 + "&producto=" + cat4 + "&servicio=" + cat5)
  .then(function(response) {
    // console.log(response)
  return response.json()
  })
  .then(function(information) {
  console.log(information);

  // <div class="resultados_resultados">
  var div = document.querySelector(".resultados_resultados");
  // console.log(div);
  // var articulo = div.querySelector(".product_editarMisArticulos");
  // console.log(articulo);
  div.innerHTML = "";

  for (var i = 0; i < information.length; i++){

    var href = "/articulo/" + information[i].id;
    var src = "/storage/articulos/" + information[i].image1
    var nombre = information[i].name;
    switch (information[i].category_id) {
      case 1: var categoria = "PLANTA";
      break;
      case 2: var categoria = "ESQUEJE";
      break;
      case 3: var categoria = "SEMILLAS";
      break;
      case 4: var categoria = "PRODUCTO";
      break;
      case 5: var categoria = "SERVICIO";
      break;
    }

    var articulo = `
      <article class="product_editarMisArticulos">

      <a class="odio_editarMisArticulos" href="${href}">
      <img class="photo_editarMisArticulos" src="${src}" alt="planta">

        <div class="texto_editarMisArticulos">
          <h3 class="h3_texto_editarMisArticulos texto_resultados">${categoria}</h3>

          <h2 class="h2_texto_editarMisArticulos texto_resultados">${nombre}</h2>
        </div>

      </a>
      </article>
      `;

    div.innerHTML += (articulo);


    //
    // var div = document.querySelector(".resultados_resultados");
    // // console.log(div);
    // var articulo = div.querySelector(".product_editarMisArticulos");
    // // console.log(articulo);
    // div.innerHTML = "";
    //
    //
    // nuevoArticulo = articulo.cloneNode(true);
    // div.append(nuevoArticulo);
    //
    // var a = nuevoArticulo.querySelector("a");
    // // console.log(a);
    // var img = nuevoArticulo.querySelector("img");
    // // console.log(img);
    // var h3 = nuevoArticulo.querySelector("h3");
    // // console.log(h3);
    // var h2 = nuevoArticulo.querySelector("h2");
    // // console.log(h2);
    //
    // // element.setAttribute(attributename, attributevalue)
    // a.setAttribute("href", "/articulo/" + information[i].id);
    // img.setAttribute("src", "/storage/articulos/" + information[i].image1);
    //
    // switch (information[i].category_id) {
    //   case 1: h3.innerText = "PLANTA";
    //   break;
    //   case 2: h3.innerText = "ESQUEJE";
    //   break;
    //   case 3: h3.innerText = "SEMILLAS";
    //   break;
    //   case 4: h3.innerText = "PRODUCTO";
    //   break;
    //   case 5: h3.innerText = "SERVICIO";
    //   break;
    // }
    //
    // // h3.innerText = information[i].category_id;
    // h2.innerText = information[i].name;
    // console.log(h3, h2);
    //
    // div.append(articulo);

  }

  })
  .catch(function(error) {
  console.log("Error: " + error);
  })
}

// Route::get('/resultados_user', 'ArticleController@searchuser');
// http://localhost:8000/api/resultados_user?user=fani
function filterUser(username){
fetch("api/resultados_user?user=" + username)
  .then(function(response) {
    // console.log(response)
  return response.json()
  })
  .then(function(information) {
  console.log(information);

  // <div class="resultados_resultados">
  var div = document.querySelector(".resultados_resultados");
  // console.log(div);
  // var articulo = div.querySelector(".product_editarMisArticulos");
  // console.log(articulo);
  div.innerHTML = "";

  for (var i = 0; i < information.length; i++){

    var href = "/usuario/" + information[i].id;
    var src = "/storage/avatares/" + information[i].avatar
    var nombre = information[i].username;

    var articulo = `
      <article class="product_editarMisArticulos">

      <a class="odio_editarMisArticulos" href="${href}">
      <img class="photo_editarMisArticulos" src="${src}" alt="planta">

        <div class="texto_editarMisArticulos">
          <h2 class="h2_texto_editarMisArticulos texto_resultados">${nombre}</h2>
        </div>

      </a>
      </article>
      `;

    div.innerHTML += (articulo);

  }

  })
  .catch(function(error) {
  console.log("Error: " + error);
  })
}
