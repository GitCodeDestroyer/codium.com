$(document).ready(function () {
    // Array for courses types
    var text = ['Язык программирования', 'Язык верстки', 'Язык стилей', 'Плагин', 'Инструмент', 'Другое'];

    // When user hovers to courses types circle, before circles popups 'text' with hovered circle 'id'
    $('.circle-color').hover(function () {
        $('.text')[0].innerHTML = text[$(this).data('color') - 1];
    });
});
