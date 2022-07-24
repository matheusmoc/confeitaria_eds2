 //----------------------------------Detail-product----------------------------------------------     
//detail-product

  
var imageProduct = document.getElementById("imageProduct");
var imageItem = document.getElementsByClassName("imageItem");

  imageItem[0].onclick = function(){
    imageProduct.src = imageItem[0].src;
  }
  imageItem[1].onclick = function(){
    imageProduct.src = imageItem[1].src;
  }
  imageItem[2].onclick = function(){
    imageProduct.src = imageItem[2].src;
  }
  imageItem[3].onclick = function(){
    imageProduct.src = imageItem[3].src;
  }
