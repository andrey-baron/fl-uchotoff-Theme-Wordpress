$(function()  {
  $('.articles__list').bxSlider({
    minSlides: 1,
    maxSlides: 3,
    slideWidth: 370,
    slideMargin: 40,
    auto: true,
    pause: 8000
  })
})

$(function()  {
	$('.service-categories__list__item, .service__map__list__item-wrapper').click(function () {
		var categories = $('.service-categories__list__item'),
				mapCategories = $('.service__map__list__item-wrapper'),
				currentCategory = $(this),
				isMapCategory = currentCategory.hasClass('service__map__list__item-wrapper'),
				contents = $('.service__content__item'),
				currentContent = $('.service__content__item').eq(currentCategory.index()).toggleClass('service__content__item--visible')

		if (isMapCategory){
			currentCategory = categories.eq(currentCategory.index())
		}
		currentContent.hasClass('service__content__item--visible') ? currentCategory.removeClass('service-categories__list__item--closed') : currentCategory.addClass('service-categories__list__item--closed')
		categories.not(currentCategory).addClass('service-categories__list__item--closed')
		contents.not(currentContent).removeClass('service__content__item--visible')

		if (contents.filter('.service__content__item--visible').length) {
			$('.service__content').addClass('service__content--visible')
			$('.service__map').removeClass('service__map--visible')
			$('.section_service__title').text(currentCategory.text())
		} else {
			$('.service__content').removeClass('service__content--visible')
			$('.service__map').addClass('service__map--visible')
			$('.section_service__title').text('Карта услуг')
		}
	})
})