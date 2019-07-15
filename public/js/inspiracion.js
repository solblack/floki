// Carrousel fotos SCANDINAVIAN
var photosScandinavian = document.querySelectorAll('img.photos-scandinavian');
var btnPreviousScandinavian = document.getElementById('previousPhoto-scandinavian');
var btnNextScandinavian = document.getElementById('nextPhoto-scandinavian');
var contadorScandinavian = 0;
var divScandinavian = document.querySelector(".div-img-scandinavian");

for (var i = 1; i < photosScandinavian.length; i++) {
  photosScandinavian[i].style.display = "none";
}

divScandinavian.addEventListener("click", function(){
  photosScandinavian[contadorScandinavian].style.display = "none";
  if (contadorScandinavian < (photosScandinavian.length - 1)) {
    contadorScandinavian++;
  } else {
    contadorScandinavian = 0;
  }
  photosScandinavian[contadorScandinavian].style.display = "inline";
});



btnPreviousScandinavian.addEventListener("click", function(){
photosScandinavian[contadorScandinavian].style.display = "none";
if (contadorScandinavian != 0) {
  contadorScandinavian--;
} else {
  contadorScandinavian = photosScandinavian.length - 1;
}
photosScandinavian[contadorScandinavian].style.display = "inline";

});

btnNextScandinavian.addEventListener('click', function(){
  photosScandinavian[contadorScandinavian].style.display = "none";
  if (contadorScandinavian < (photosScandinavian.length - 1)) {
    contadorScandinavian++;
  } else {
    contadorScandinavian = 0;
  }
  photosScandinavian[contadorScandinavian].style.display = "inline";
});


// Carrousel fotos BOHO
var photosBoho = document.querySelectorAll('img.photos-boho');
var btnPreviousBoho = document.getElementById('previousPhoto-boho');
var btnNextBoho = document.getElementById('nextPhoto-boho');
var contadorBoho = 0;
var divBoho = document.querySelector(".div-img-boho");

for (var i = 1; i < photosBoho.length; i++) {
  photosBoho[i].style.display = "none";
}

divBoho.addEventListener("click", function(){
  photosBoho[contadorBoho].style.display = "none";
  if (contadorBoho < (photosBoho.length - 1)) {
    contadorBoho++;
  } else {
    contadorBoho = 0;
  }
  photosBoho[contadorBoho].style.display = "inline";
});



btnPreviousBoho.addEventListener("click", function(){
photosBoho[contadorBoho].style.display = "none";
if (contadorBoho != 0) {
  contadorBoho--;
} else {
  contadorBoho = photosBoho.length - 1;
}
photosBoho[contadorBoho].style.display = "inline";

});

btnNextBoho.addEventListener('click', function(){
  photosBoho[contadorBoho].style.display = "none";
  if (contadorBoho < (photosBoho.length - 1)) {
    contadorBoho++;
  } else {
    contadorBoho = 0;
  }
  photosBoho[contadorBoho].style.display = "inline";
});


// Carrousel fotos SHABBY
var photosShabby = document.querySelectorAll('img.photos-shabby');
var btnPreviousShabby = document.getElementById('previousPhoto-shabby');
var btnNextShabby = document.getElementById('nextPhoto-shabby');
var contadorShabby = 0;
var divShabby = document.querySelector(".div-img-shabby");

for (var i = 1; i < photosShabby.length; i++) {
  photosShabby[i].style.display = "none";
}

divShabby.addEventListener("click", function(){
  photosShabby[contadorShabby].style.display = "none";
  if (contadorShabby < (photosShabby.length - 1)) {
    contadorShabby++;
  } else {
    contadorShabby = 0;
  }
  photosShabby[contadorShabby].style.display = "inline";
});



btnPreviousShabby.addEventListener("click", function(){
photosShabby[contadorShabby].style.display = "none";
if (contadorShabby != 0) {
  contadorShabby--;
} else {
  contadorShabby = photosShabby.length - 1;
}
photosShabby[contadorShabby].style.display = "inline";

});

btnNextShabby.addEventListener('click', function(){
  photosShabby[contadorShabby].style.display = "none";
  if (contadorShabby < (photosShabby.length - 1)) {
    contadorShabby++;
  } else {
    contadorShabby = 0;
  }
  photosShabby[contadorShabby].style.display = "inline";
});
