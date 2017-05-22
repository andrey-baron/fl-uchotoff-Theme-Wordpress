$(function()  {
  var sliders = []
  // Слайдеры
  $('.header__slider').bxSlider()

  sliders[0] = $('.section-partner__slider').bxSlider({
    minSlides: 1,
    maxSlides: 4,
    slideWidth: 360,
    slideMargin: 10
  })

  sliders[1] = $('.section_useful_articles__slider').bxSlider({
    minSlides: 1,
    maxSlides: 3,
    slideWidth: 370,
    slideMargin: 10
  })

  // Карта
  $('.map-hover-point').each(function(index, element)  {
    var $element = $(element)
    var id = $element.data('group-id')
    var selector = ((".map-hover-point[data-group-id=" + id) + "]")
    var activeClass = 'active'

    $element.hover(function()  {
      $(selector).addClass(activeClass)
    }, function()  {
      $(selector).removeClass(activeClass)
    })
  })

  //Суко-ховер-пнг-иконки
  $('.mask-hoer-png-icons').each(function(index, element)  {
    var $element = $(element)
    var url = $element.data('icon-url')
    var $maskElement = $('<div>')
    var $img = $((("<img src='" + url) + "'>"))

    $maskElement.css({
      '-webkit-mask-image': (("url(" + url) + ")"),
      'mask-image': (("url(" + url) + ")"),
      '-webkit-mask-position': 'center center',
      'mask-position': 'center center',
      '-webkit-mask-repeat': 'no-repeat',
      'mask-repeat': 'no-repeat',
      'mask-size': 'cover',
      '-webkit-mask-size': 'cover',
      'width':'100%',
      'height':'100%'
    })

    $element.append($maskElement).append($img)
  })
})
