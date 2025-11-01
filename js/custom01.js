const mySwiper = new Swiper('.swiper', {
	loop: true,
	effect: 'fade',
	autoplay: {
	delay: 4000, // 4•b
	disableOnInteraction: false,
  }, 
   
  // If we need pagination
pagination: {
	el: '.swiper-pagination',
        clickable: true,
  },
 
  // Navigation arrows
navigation: {
	nextEl: '.swiper-button-next',
	prevEl: '.swiper-button-prev',
  },
});



document.addEventListener('DOMContentLoaded', function() {
  const mainImage = document.querySelector('.product-image img');
  const mainLink  = document.querySelector('.product-image a');
  const thumbs    = document.querySelectorAll('.thumbs a');

  thumbs.forEach(thumb => {
    thumb.addEventListener('click', function(e) {
      e.preventDefault();

      const newSrc = this.querySelector('img').src.replace('-150x150', '');
      mainImage.src = newSrc;
      mainLink.href = newSrc;
      thumbs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');
    });
  });
});

