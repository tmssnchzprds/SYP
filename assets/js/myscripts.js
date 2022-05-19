 (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
    $(document).ready(function(){
 $('#password, #confirm').on('keyup', function () {
        if ($('#password').val() != '' && $('#confirm').val() != '' && $('#password').val() == $('#confirm').val()) {
          $("#submitBtn").attr("disabled",false);
          $('#confirmValid').show();
          $('#confirmInvalid').hide();
          $('#confirmValid').html('<i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>').css('color', 'green');
          $('.pwds').removeClass('is-invalid')
        } else {
          $("#submitBtn").attr("disabled",true);
          $('#confirmValid').hide();
          $('#confirmInvalid').show();
          $('#confirmInvalid').html('<i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>Las contraseñas deben ser iguales').css('color', 'red');
          $('.pwds').addClass('is-invalid')
        }
 });
      let currForm1 = document.getElementById('signin-form');
        // Validate on submit:
        currForm1.addEventListener('submit', function(event) {
          if (currForm1.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          currForm1.classList.add('was-validated');
        }, false);
        // Validate on input:
        currForm1.querySelectorAll('.form-control').forEach(input => {
          input.addEventListener(('input'), () => {
            if (input.checkValidity()) {
              input.classList.remove('is-invalid')
              input.classList.add('is-valid');
            } else {
              input.classList.remove('is-valid')
              input.classList.add('is-invalid');
            }
            var is_valid = $('.form-control').length === $('.form-control.is-valid').length;
            $("#submitBtn").attr("disabled", !is_valid);
          });
        });
 });
 function modal(nombre) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	document.getElementById("cargar").parentNode.removeChild(document.getElementById("cargar"));
        document.getElementById("ajax").innerHTML =this.responseText;
      }
    };
    xmlhttp.open("GET", "index.php?mod=Ajax&ope=", true);
    xmlhttp.send();
  }
 function paginacion(ope,buscador,idCat,tipo,pagina) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	document.getElementById("cargar").parentNode.removeChild(document.getElementById("cargar"));
        document.getElementById("ajax").innerHTML =this.responseText;
      }
    };
    if (idCat!=0){
        var categoria = "&idCat=" + idCat;
    } else {
        var categoria = "";
    }
    if (buscar!=""){
        var buscar = "&buscar=" + buscador;
    } else {
        var buscar = "";
    }
        if (tipo!=0){
        var seropel = "&tipo=" + tipo;
    } else {
        var seropel = "";
    }
    xmlhttp.open("GET", "index.php?mod=Ajax&ope=" + ope + buscar + categoria + seropel + "&pagina=" + pagina, true);
    xmlhttp.send();
  }
  function comentarios(idSeropel,season,episode) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	document.getElementById("cargar").parentNode.removeChild(document.getElementById("cargar"));
        document.getElementById("ajax").innerHTML =this.responseText;
      }
    };
    var seropel = "&idSeropel=" + idSeropel;
    var operacion = "&ope=comentario";
    if (season!=0){
        var temporada = "&season=" + season;
        operacion = "&ope=comentariotemporada";
    } else {
        var temporada = "";
    }
    if (episode!=0){
        var episodio = "&episode=" + episode;
        operacion = "&ope=comentarioepisodio";
    } else {
        var episodio = "";
    }
    xmlhttp.open("GET", "index.php?mod=Ajax"+ operacion + seropel + temporada + episodio, true);
    xmlhttp.send();
  }
  function episodeclick(epiact,text){
        var season ;
        var episodes = [];
        episodes[0]=0;
        for(var i in text)
        episodes[i] = text[i];
        season = document.commentaryform.season[document.commentaryform.season.selectedIndex].value ;
        if (season != 0) {
        var num_episodes = episodes[season];
      	//marco el número de episodes en el select 
      	document.commentaryform.episode.length = parseInt(num_episodes)+1 ;
      	//para cada episode del array, la introduzco en el select 
      	for(i=1;i<parseInt(num_episodes)+1;i++){ 
         	document.commentaryform.episode.options[i].value=i ;
         	document.commentaryform.episode.options[i].text='Episodio '+i ;
                if (i==epiact){
                document.commentaryform.episode.options[i].selected=true;
            }
      	}	
   	}else{ 
      	//si no había episode seleccionada, elimino las episodes del select 
      	document.commentaryform.episode.length = 1 ;
      	//coloco un guión en la única opción que he dejado 
      	document.commentaryform.episode.options[0].value = "0" ;
      	document.commentaryform.episode.options[0].text = "Todos los Episodios" ;
        document.commentaryform.episode.options[0].selected=true;
   	} 
  }
    function episodechange(epiact,text){
        var season ;
        var episodes = [];
        episodes[0]=0;
        for(var i in text)
        episodes[i] = text[i];
        season = document.commentaryform.season[document.commentaryform.season.selectedIndex].value ;
        if (season != 0) {
        var num_episodes = episodes[season];
      	//marco el número de episodes en el select 
      	document.commentaryform.episode.length = parseInt(num_episodes)+1 ;
      	//para cada episode del array, la introduzco en el select 
      	for(i=1;i<parseInt(num_episodes)+1;i++){ 
         	document.commentaryform.episode.options[i].value=i ;
         	document.commentaryform.episode.options[i].text='Episodio '+i ;
                if (i==epiact){
                document.commentaryform.episode.options[i].selected=true;
            }
      	}	
   	}else{ 
      	//si no había episode seleccionada, elimino las episodes del select 
      	document.commentaryform.episode.length = 1 ;
      	//coloco un guión en la única opción que he dejado 
      	document.commentaryform.episode.options[0].value = "0" ;
      	document.commentaryform.episode.options[0].text = "Todos los Episodios" ;
        document.commentaryform.episode.options[0].selected=true;
   	} 
}
 function modificaridCom(idCom){
        var result ="<?php $comentario = Comentario::getId("+idCom+"); ?>"
        document.write(result);
}
 function eliminaridCom(idCom){
        var result ="<?php $idCom="+idCom+"; ?>"
        document.write(result);
}
  function showMessage(success,msg){
      if (success==0){
            document.getElementById("success").textContent = msg;
             document.getElementById("success").style.display ="block";
               setTimeout(function(){
                    document.getElementById("success").style.display = "none";
                },5000);
         }else{
             document.getElementById("failure").textContent = msg;
             document.getElementById("failure").style.display = "block";
             setTimeout(function(){
                    document.getElementById("failure").style.display = "none";
                },5000);
         }
  }
function sethidden(temporada){
     document.getElementById('temporada_' + temporada).style.display = document.getElementById('temporada_' + temporada).style.display == "none"?"block":"none";
     document.getElementById('span_' + temporada).className = document.getElementById('span_' + temporada).className == "fa fa-2x fa-arrow-circle-o-down"?"fa fa-2x fa-arrow-circle-o-up":"fa fa-2x fa-arrow-circle-o-down";
}