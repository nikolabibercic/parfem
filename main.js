var navLink6 = document.getElementById('navLink6');
if(navLink6 != null){
    navLink6.onmouseover = function(){
        navLink6.style.color = 'darkblue';
        navLink6.style.backgroundColor = 'white';
    }
    navLink6.onmouseleave = function(){
        navLink6.style.color = 'white';
        navLink6.style.backgroundColor = 'darkblue';
    }
}

var navLink1 = document.getElementById('navLink1');
if(navLink1 != null){
    navLink1.onmouseover = function(){
        navLink1.style.color = 'darkblue';
        navLink1.style.backgroundColor = 'white';
    }
    navLink1.onmouseleave = function(){
        navLink1.style.color = 'white';
        navLink1.style.backgroundColor = 'darkblue';
    }
}

var navLink2 = document.getElementById('navLink2');
if(navLink2 != null){
    navLink2.onmouseover = function(){
        navLink2.style.color = 'darkblue';
        navLink2.style.backgroundColor = 'white';
    }
    navLink2.onmouseleave = function(){
        navLink2.style.color = 'white';
        navLink2.style.backgroundColor = 'darkblue';
    }
}

var navLink3 = document.getElementById('navLink3');
if(navLink3 != null){
    navLink3.onmouseover = function(){
        navLink3.style.color = 'darkblue';
        navLink3.style.backgroundColor = 'white';
    }
    navLink3.onmouseleave = function(){
        navLink3.style.color = 'white';
        navLink3.style.backgroundColor = 'darkblue';
    }
}

var navLink4 = document.getElementById('navLink4');
if(navLink4 != null){
    navLink4.onmouseover = function(){
        navLink4.style.color = 'darkblue';
        navLink4.style.backgroundColor = 'white';
    }
    navLink4.onmouseleave = function(){
        navLink4.style.color = 'white';
        navLink4.style.backgroundColor = 'darkblue';
    }
}

$(document).ready(function(){
    $(window).scroll(function () {
           if ($(this).scrollTop() > 50) {
               $('#back-to-top').fadeIn();
           } else {
               $('#back-to-top').fadeOut();
           }
       });
       // scroll body to 0px on click
       $('#back-to-top').click(function () {
           $('#back-to-top').tooltip('hide');
           $('body,html').animate({
               scrollTop: 0
           }, 800);
           return false;
       });
       
       $('#back-to-top').tooltip('show');

});

