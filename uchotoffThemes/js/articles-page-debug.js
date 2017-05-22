$(function()  {
  $('.articles-archive__select > .articles-archive__select__button').click(function () {
    var select = $(this).parent().toggleClass('articles-archive__select--closed')
    $('.articles-archive__select').not(select).addClass('articles-archive__select--closed')
  })
});
