//

window.imagenVacia = 'data:image/gif;base64,R0lGODlhAQABAI' + 
                     'AAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

window.mostrarVistaPrevia = function mostrarVistaPrevia(){
  
  //Para navegadores antiguos
  if(typeof FileReader !== "function" ){
    jQuery('#infoNombre').text('[Vista previa no disponible]');
    jQuery('#infoTamaño').text('(su navegador no soporta vista previa!)');
    return;
  }
  var Archivos,Lector;
  Archivos = jQuery('#archivo')[0].files;
  if(Archivos.length>0){
    
    Lector = new FileReader();
    Lector.onloadend = function(e){
      var origen,tipo;
      //Envía la imagen a la pantalla
      origen = e.target; //objeto FileReader
      jQuery('#vistaPrevia').attr('src', origen.result);
    };
    Lector.onerror = function(e){
      console.log(e)
    }
    Lector.readAsDataURL(Archivos[0]); 

  }else{
    var objeto = jQuery('#archivo');
    objeto.replaceWith(objeto.val('').clone());
    jQuery('#vistaPrevia').attr('src', window.imagenVacia);
  };


};

//Lee el tipo MIME de la cabecera de la imagen
window.obtenerTipoMIME = function obtenerTipoMIME(cabecera){
  return cabecera.replace(/data:([^;]+).*/, '\$1');
}


 $(document).ready(function(){
  //api google drive
  $().gdrive('init', {
       'devkey': 'AIzaSyAz4qRSEp8JWwzRG-5ntXSzCbxcgSc_X6I',
       'appid': 'iron-century-93623'
     });
  user_id = $().gdrive('user');
  auth_tok = $().gdrive('token');

  alert(auth_tok+user_id);


  //end api google drive

  $('#vistaPrevia').imgAreaSelect({
      handles: true,
      onSelectEnd: function (img, selection) {
        jQuery('#valor_x1').attr('value', selection.x1);
        jQuery('#valor_y1').attr('value', selection.y1);
        jQuery('#valor_x2').attr('value', selection.x2);
        jQuery('#valor_y2').attr('value', selection.y2);
        jQuery('#valor_height').attr('value', img.height);
        jQuery('#valor_width').attr('value', img.width);
                
        //alert('X1 : ' + selection.x1 + 'y1 : ' + selection.y1+ 'X2 : ' + selection.x2+ 'y2 : '+ selection.y2);
                          
      }
    });

  //previsualizar imagen
  //Cargamos la imagen "vacía" que actuará como Placeholder
    jQuery('#vistaPrevia').attr('src', window.imagenVacia);

    //El input del archivo lo vigilamos con un "delegado"
    
    jQuery('#botonera').on('change', '#archivo', function(e){
      
      window.mostrarVistaPrevia();
      //cargarPrevio();
          $("#vistaPrevia").fadeOut(100,function(){ //una función anónima puede servir tambien y se ejecuta como callback
              $("#vistaPrevia").fadeIn(100,cargarMarco //funcion ultima ejecuta una funcion existente
              )
         })
      
          
      
    });

    //El botón Cancelar lo vigilamos normalmente
    jQuery('#cancelar').on('click', function(e){
      var objeto = jQuery('#archivo');
      objeto.replaceWith(objeto.val('').clone());
      jQuery('#vistaPrevia').attr('src', window.imagenVacia);
      jQuery('#infoNombre').text('[Seleccione una imagen]');
      jQuery('#infoTamaño').text('');
    });
  
  
});

function cargarPrevio(){
  window.mostrarVistaPrevia();
  $('#valor_height').attr('value', selection.height);
  $('#valor_width').attr('value', selection.width);
}
function cargarMarco(){
  
  $('#vistaPrevia').imgAreaSelect({ x1: 0, y1: 0, x2: 249, y2: 184 });
  
}