$(document).ready(function() {
  if($('html,body').scrollTop() >20){
    $('.scroll-to-top:first').css('display','block');
  }

  $(window).scroll(function(event) {
      var pos_body = $('html,body').scrollTop();
      if(pos_body > 20){
        $('.scroll-to-top:first').css('display','block');
        // $('.main-menu-div:first').css('top','-9px')
        // $('.main-menu-div:first').css('transform','scaleY(0.8)')
        // $('.content:first').css('top','90px')
        // $('.content:first').css('margin-bottom','90px')
        // $('.site-brand:first').css('transform','scaleX(0.8)')
        // $('.main-menu:first').css('transform','scaleX(0.8)')
        //$('#responsive-menu-button').css('top','9px')
      }
      if(pos_body <10){
        $('.scroll-to-top:first').css('display','none');
        // if($( window ).width() >1024){
        //   //$('#responsive-menu-button').css('top','60px')
        //   $('.main-menu-div:first').css('top','45px')
        //   $('.main-menu-div:first').css('transform','scaleY(1)')
        //   $('.content:first').css('top','105px')
        //   $('.content:first').css('margin-bottom','105px')
        //   $('.site-brand:first').css('transform','scaleX(1)')
        //   $('.main-menu:first').css('transform','scaleX(1)')
        // }else{
        //   $('.main-menu-div:first').css('top','0px')
        //   $('.main-menu-div:first').css('transform','scaleY(1)')
        //   $('.content:first').css('top','45px')
        //   $('.content:first').css('margin-bottom','45px')
        //   $('.site-brand:first').css('transform','scaleX(1)')
        //   $('.main-menu:first').css('transform','scaleX(1)')
        }
        
      });


console.log($( window ).width());

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




