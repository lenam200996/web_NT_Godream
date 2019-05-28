$(document).ready(function() {
  if($('html,body').scrollTop() >20){
    $('.scroll-to-top:first').css('display','block');
}

$(window).scroll(function(event) {
    var pos_body = $('html,body').scrollTop();
    if(pos_body > 20){
      $('.scroll-to-top:first').css('display','block');
    }
    if(pos_body <10){
      $('.scroll-to-top:first').css('display','none');
    }  
});
  new WOW().init();
  $('.scroll-to-top:first').click(function(){
     $('html, body').stop().animate({
        scrollTop: $('html, body').offset().top-100
      }, 1000);
  })
});

$('.btnTogSearchForm').click(function(){
    $('.btnTogSearchForm').css('display','none');
    $('#main-search').css('display','block');
    $('.topinput').css('animation','ani-input 1s forwards')
    $('.search-form').css('border','.5px solid #ccc')
    if($( window ).width() >1200){
      $('.search-form').css('transform','translateX(200px)')
      $('nav:first').css('transform','translateX(-100px)')
    }
})


function hoverimage(element,id) {
	element.classList.add("active");
	var span = document.getElementById('span-'+id);
	var btn = document.getElementById('btn-'+id);
	var div = document.getElementById('div-'+id);
	span.style.display="block";
	btn.style.display="block";
	div.classList.add("active-project-item");
}

function outimage(element,id){
	element.classList.remove("active");
	var span = document.getElementById('span-'+id);
	var btn = document.getElementById('btn-'+id);
	var div = document.getElementById('div-'+id);
	span.style.display="none";
	btn.style.display="none";
	div.classList.remove("active-project-item");
}

$('#toggle-menu-id').click(function(){
    if($('#toggle-menu-id').val() == "on"){
        $('#menu-responsive-id').css('animation',"menu-responsive-in 1s forwards");
        $('#toggle-menu-id').val("off");
        $('#toggle-menu-id').empty();
        $('#toggle-menu-id').append('<i class="fas fa-times"></i>');
    }else{
        $('#menu-responsive-id').css('animation',"menu-responsive-out 1s forwards");
        $('#toggle-menu-id').val("on");
        $('#toggle-menu-id').empty();
        $('#toggle-menu-id').append('<i class="fas fa-bars"></i>');
    }
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    speed:200,
    asNavFor: '.slider-nav',
    autoplay:true,
    autoplaySpeed: 4000
  })
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  arrows:false,
  centerPadding:'0',
  centerMode: true,
  focusOnSelect: true
});


$('#subqua').click(function(){
  var quantity = parseInt($('#input-quantity').val());
  if(quantity > 1){
    $('#input-quantity').val(quantity-1);
  }

})

$('#plusqua').click(function(){
   var quantity = parseInt($('#input-quantity').val());
  $('#input-quantity').val(quantity+1);
})


$('.img-btn-carousel-product').click(function() {
  var src = $(this).attr('src')
  $('#img-show-product').attr('src',src)
  console.log($('#img-show-product').attr('src'))
})


