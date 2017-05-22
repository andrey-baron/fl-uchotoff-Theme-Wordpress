$(function()  {
  $.getScript('http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU', function () {
    ymaps.ready(function () {
      $('[data-map]').each(function () {var this$0 = this;
        var e = $(this),
            geoCoder = new ymaps.geocode(e.data('mapAddress'), {results: 1})
        geoCoder.then(function(res)  {
          var point,
              map = new ymaps.Map($(this$0).attr('id'), {
                zoom: 3,
                center: [55.76, 37.64]
              })
          if (res.geoObjects.getLength()) {
            point = res.geoObjects.get(0)
            map.geoObjects.add(point)
            map.panTo(point.geometry.getCoordinates())
            map.setBounds(point.properties.get('boundedBy'))
          }
        })
      })
    })
  })
})
