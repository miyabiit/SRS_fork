$(function(){
        $("#open").show();
        $("#close").hide();

	$("#open").click(function(){
		$("#navi").slideToggle();
        $("#open").hide();
        $("#close").show();
	});
 
	$("#close").click(function(){

		$("#navi").slideToggle();
        $("#open").show();
        $("#close").hide();
	});
});    

document.addEventListener('DOMContentLoaded', function () {
  const accordions = document.querySelectorAll('.accordion');
  accordions.forEach(accordion => {
    let clickCount = 0; // クリック回数を管理

    accordion.addEventListener('click', function (event) {
      const screenWidth = window.innerWidth; // 現在の画面幅
      const panel = this.nextElementSibling;

      if (screenWidth <= 921) {
        // 921px以下
        event.preventDefault(); // デフォルト動作を止める
        if (clickCount === 0) {
          this.classList.toggle("active");
          panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + "px";
          clickCount++;
        } else if (clickCount === 1) {
          clickCount = 0; // カウントをリセット
          window.location.href = this.getAttribute('href'); // 遷移
        }
      } else {
        // 921px以上
        clickCount = 0; // リセットして遷移
        return; // デフォルト動作でそのまま遷移
      }
    });
  });
});





$(function () {
    var topBtn = $('#pagetop');
    topBtn.hide();

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });

    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 200){
                $(this).addClass('scrollin');
            }
        });
    });
});

document.querySelectorAll('p:empty').forEach(p => p.remove());



