$(() => {
	$.getScript('http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU', function () {
		ymaps.ready(function () {
			$('[data-map]').each(function () {
				let map = new ymaps.Map($(this).attr('id'), {
	          center: [55.76, 37.64],
	          zoom: 7
	      })
			})
		})
	})
})