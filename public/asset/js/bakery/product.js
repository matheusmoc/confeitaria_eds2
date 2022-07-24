//----------------------------Product----------------------------------------------
//menu product-left
var coll = document.getElementsByClassName("name-list");
let classRotate = document.getElementsByClassName("rotate");



for (let i = 0; i < coll.length; i++) {

  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");

    classRotate[i].classList.toggle('down')


    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";

    } else {
      content.style.display = "block";
    }
  });
}

for (let i = 0; i < classRotate.length; i++) {
  classRotate[i].addEventListener("click", function () {
    classRotate[i].classList.toggle('down')
    this.classList.toggle('down');

  });
}




//product-left;



  var iconMenu = document.getElementById('iconMenu');
   var navProductList = document.getElementById('nav-product-list');
   var navProduct = document.getElementById('nav-product');

 iconMenu.addEventListener('click',function(){
   if(navProductList.style.display ==="none" && navProduct.style.display ==="none"){
     navProductList.style.display ="block";
     navProduct.style.display ="block"
   }else{
      navProductList.style.display ="none";
      navProduct.style.display ="none"
   }
 })
  // navProductList.addEventListener('click',function(){
  //   navProductList.style.display ="none";
  //   navProduct.style.display ="none"
  //  })


