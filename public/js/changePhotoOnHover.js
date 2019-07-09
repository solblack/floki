// Cambio de foto SHOP on hover
var articles = document.querySelectorAll("article.js-img-hover");
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
