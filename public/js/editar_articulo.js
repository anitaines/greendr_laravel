// window.onload = function(){

  var borrarArticulo = document.querySelector(".formB_editarArticulo");
  // console.log(borrarArticulo);
  var articulo = document.querySelector(".hidden_id").value;
  // console.log(articulo);

  borrarArticulo.onsubmit = function(event){
    event.preventDefault();
    var confirmacion = confirm("¿ELIMINAR planta?");
    if (confirmacion){
      location.href = "/eliminar/" + articulo;
      // console.log("eliminando");
    }else{
      location.href = "/editar_articulo/" + articulo;
      // console.log("cancel");
    }
}


// }
