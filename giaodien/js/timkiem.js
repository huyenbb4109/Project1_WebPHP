// const input = document.getElementById("search-input");
// const searchBtn = document.getElementById("search-btn");

// const expand = () => {
//   searchBtn.classList.toggle("close");
//   input.classList.toggle("square");
// };

// searchBtn.addEventListener("click", expand);


$(document).ready(function(){
  $("#search").focus(function() {
    $(".search-box").addClass("border-searching");
    $(".search-icon").addClass("si-rotate");
  });
  $("#search").blur(function() {
    $(".search-box").removeClass("border-searching");
    $(".search-icon").removeClass("si-rotate");
  });
  $("#search").keyup(function() {
      if($(this).val().length > 0) {
        $(".go-icon").addClass("go-in");
      }
      else {
        $(".go-icon").removeClass("go-in");
      }
  });
  $(".go-icon").click(function(){
    $(".search-form").submit();
  });
});



// old version / jquery

// function expand() {
//   $(".search").toggleClass("close");
//   $(".input").toggleClass("square");
//   if ($('.search').hasClass('close')) {
//     $('input').focus();
//   } else {
//     $('input').blur();
//   }
// }
// $('button').on('click', expand);
