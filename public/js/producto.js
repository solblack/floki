// Carrousel fotos producto
var photos = document.querySelectorAll('img.productPhotos');
var btnPrevious = document.getElementById('previousPhoto');
var btnNext = document.getElementById('nextPhoto');
var contador = 0;

for (var i = 1; i < photos.length; i++) {
  photos[i].style.display = "none";
}



btnPrevious.addEventListener("click", function(){
photos[contador].style.display = "none";
if (contador != 0) {
  contador--;
} else {
  contador = photos.length - 1;
}
photos[contador].style.display = "inline";

});

btnNext.addEventListener('click', function(){
  photos[contador].style.display = "none";
  if (contador < (photos.length - 1)) {
    contador++;
  } else {
    contador = 0;
  }
  photos[contador].style.display = "inline";
});



// Cambio de foto SHOP on hover
var articles = document.querySelectorAll("article");
var photosHover = [];

for (var article of articles) {
   photosHover.push(article.querySelectorAll('img.productPhotosHover'));
}

for (let i = 0; i < articles.length; i++) {

      for (var p = 1; p < photosHover[i].length; p++) {
        photosHover[i][p].style.display = "none";
      }



      photosHover[i][0].addEventListener("mouseover", function(){
      if ( photosHover[i].length >= 2) {
        photosHover[i][0].style.display = "none";
        photosHover[i][1].style.display = "inline";
      }

    });

    photosHover[i][1].addEventListener("mouseout", function(){
      if ( photosHover[i].length >= 2) {
        photosHover[i][1].style.display = "none";
        photosHover[i][0].style.display = "inline";
      }

    });


}
