$(document).ready(function () {
  'use strict';
  const menuBtn = document.querySelector(".menu-icon span");
  const searchBtn = document.querySelector(".search-icon");
  const cancelBtn = document.querySelector(".cancel-icon");
  const items = document.querySelector(".nav-items");
  const form = document.querySelector("form");
  const perfil = $('.perfil');
  const datos = $('div.datos');
  const quitar = $('.nav-items li i.quitado');
  $('.elmenu').hide();

  menuBtn.onclick = () => {
    $('.elmenu').show();
    items.classList.add("active");
    menuBtn.classList.add("hide");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
  }
$('.elmenu').on('click',function(){
  $('.elmenu').hide();
  items.classList.remove("active");
    menuBtn.classList.remove("hide");
    searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#ff3d00";
    datos.removeClass('login');
});
  cancelBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#ff3d00";
    datos.removeClass('login');
  }
  searchBtn.onclick = () => {
    form.classList.add("active");
    searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
  }
});
$('.nombre_perfil').on('click', function () {
  $('.uluser').show();
});
$('.img_user').on('click', function () {
  $('.uluser').show();
});
$('.eyes').on('click', function () {
  $('.uluser').hide();
});
function horarios() {
  Swal.fire({
    title: 'Horario:',
    html: '<b class="horario-alert"> lunes 8:00–13:00, 15:00–19:00 <br>martes	8:00–13:00, 15:00–19:00<br> miércoles	8:00–13:00, 15:00–19:00<br> jueves	8:00–13:00, 15:00–19:00<br> viernes	8:00–13:00, 15:00–19:00<br> sábado	8:00–13:00 <br>domingo:	Cerrado</b>',
    icon: 'info',
    footer: '&copy Todos los derechos reservados msp 2020',
    confirmButtonText: 'OK',
    customClass: {
      icon: 'icon-class',
      html: 'horario-class',
      title: 'title-class',
      header: 'header-class'
    }
  })
};

/* ------------------------ */
	
if( 'ontouchstart' in window ){ var click = 'touchstart'; }
else { var click = 'click'; }


$('div.burger').on(click, function(){

    if( !$(this).hasClass('open') ){ openMenu(); } 
    else { closeMenu(); }

});


$('div.menu ul li a').on(click, function(e){
  e.preventDefault();
  closeMenu();
});		


function openMenu(){
  
  $('div.circle').addClass('expand');
        
  $('div.burger').addClass('open');	
  $('div.x, div.y, div.z').addClass('collapse');
  $('.menu li').addClass('animate');
  
  setTimeout(function(){ 
    $('div.y').hide(); 
    $('div.x').addClass('rotate30'); 
    $('div.z').addClass('rotate150'); 
  }, 70);
  setTimeout(function(){
    $('div.x').addClass('rotate45'); 
    $('div.z').addClass('rotate135');  
  }, 120);

}

function closeMenu(){

  $('div.burger').removeClass('open');	
  $('div.x').removeClass('rotate45').addClass('rotate30'); 
  $('div.z').removeClass('rotate135').addClass('rotate150');				
  $('div.circle').removeClass('expand');
  $('.menu li').removeClass('animate');
  
  setTimeout(function(){ 			
    $('div.x').removeClass('rotate30'); 
    $('div.z').removeClass('rotate150'); 			
  }, 50);
  setTimeout(function(){
    $('div.y').show(); 
    $('div.x, div.y, div.z').removeClass('collapse');
  }, 70);													
}

  $("html").click(function() {
    closeMenu();
   });
   $('.burger').click(function (e) {
    e.stopPropagation();
});
$('.circle').click(function (e) {
  e.stopPropagation();
});

$('.expand').click(function (e) {
  e.stopPropagation();
});
