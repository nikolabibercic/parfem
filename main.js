var xhttp;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);

var navLink6 = document.getElementById('navLink6');
if(navLink6 != null){
    navLink6.onmouseover = function(){
        navLink6.style.color = myObj[0].setting_value;
        navLink6.style.backgroundColor = myObj[0].setting_value_2;
    }
    navLink6.onmouseleave = function(){
        navLink6.style.color = myObj[0].setting_value_2;
        navLink6.style.backgroundColor = myObj[0].setting_value;
    }
}

var navLink1 = document.getElementById('navLink1');
if(navLink1 != null){
    navLink1.onmouseover = function(){
        navLink1.style.color = myObj[0].setting_value;
        navLink1.style.backgroundColor = myObj[0].setting_value_2;
    }
    navLink1.onmouseleave = function(){
        navLink1.style.color = myObj[0].setting_value_2;
        navLink1.style.backgroundColor = myObj[0].setting_value;
    }
}

var navLink2 = document.getElementById('navLink2');
if(navLink2 != null){
    navLink2.onmouseover = function(){
        navLink2.style.color = myObj[0].setting_value;
        navLink2.style.backgroundColor = myObj[0].setting_value_2;
    }
    navLink2.onmouseleave = function(){
        navLink2.style.color = myObj[0].setting_value_2;
        navLink2.style.backgroundColor = myObj[0].setting_value;
    }
}

var navLink3 = document.getElementById('navLink3');
if(navLink3 != null){
    navLink3.onmouseover = function(){
        navLink3.style.color = myObj[0].setting_value;
        navLink3.style.backgroundColor = myObj[0].setting_value_2;
    }
    navLink3.onmouseleave = function(){
        navLink3.style.color = myObj[0].setting_value_2;
        navLink3.style.backgroundColor = myObj[0].setting_value;
    }
}

var navLink4 = document.getElementById('navLink4');
if(navLink4 != null){
    navLink4.onmouseover = function(){
        navLink4.style.color = myObj[0].setting_value;
        navLink4.style.backgroundColor = myObj[0].setting_value_2;
    }
    navLink4.onmouseleave = function(){
        navLink4.style.color = myObj[0].setting_value_2;
        navLink4.style.backgroundColor = myObj[0].setting_value;
    }
}

    }
};
xhttp.open("GET", "/shop/files/navbarColor.php", true);
xhttp.send();



var backToTop = document.getElementById('back-to-top');
backToTop.onclick = function(){
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}



function showBrands(categoryId) {
var xhttp;
if (categoryId == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
}
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
};
xhttp.open("GET", "/shop/files/selectBrandsList.php?categoryId="+categoryId, true);
xhttp.send();
}

