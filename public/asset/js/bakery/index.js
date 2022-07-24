// -------------------------Index------------------------------------------------




//header responsive

  var iconBar = document.getElementById('icon-bar');
  var contentHeader = document.getElementById('content-header');

     iconBar.addEventListener('click',function(){
      if(contentHeader.style.display === "none"){
        contentHeader.style.display ="block";
      }else{
        contentHeader.style.display = "none";
      }
      
    })


  // search responsive

    var iconSearch = document.getElementById('icon-search');
    var iconClose = document.getElementById('icon-close');
    var searchNav = document.getElementById('search-nav');
    

    iconSearch.addEventListener('click',function(){
      if(searchNav.style.display === "none"){
        searchNav.style.display ="flex";
      }else{
        searchNav.style.display = "none";
      }
    })
    iconClose.addEventListener('click',function(){
      searchNav.style.display ="none";
    })

// slider

$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 2,
  nav: true,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    }, 
    700: {
      items: 2
    }, 
    800: {
      items: 2
    }, 
    1000: {
      items: 4
    }
  }
})

//scroll top

var mybtn = document.getElementById("scroll");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    mybtn.style.display = "block";
  } else {
    mybtn.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}








