// $(".heart:before").click(function(){
//     $(this).toggleClass("paused");
// })
// $('.select').each(function() {
//     const _this = $(this),
//         selectOption = _this.find('option'),
//         selectOptionLength = selectOption.length,
//         selectedOption = selectOption.filter(':selected'),
//         duration = 450; // длительность анимации 

//     _this.hide();
//     _this.wrap('<div class="select"></div>');
//     $('<div>', {
//         class: 'new-select',
//         text: _this.children('option:disabled').text()
//     }).insertAfter(_this);

//     const selectHead = _this.next('.new-select');
//     $('<div>', {
//         class: 'new-select__list'
//     }).insertAfter(selectHead);

//     const selectList = selectHead.next('.new-select__list');
//     for (let i = 1; i < selectOptionLength; i++) {
//         $('<div>', {
//             class: 'new-select__item',
//             html: $('<span>', {
//                 text: selectOption.eq(i).text()
//             })
//         })
//         .attr('data-value', selectOption.eq(i).val())
//         .appendTo(selectList);
//     }

//     const selectItem = selectList.find('.new-select__item');
//     selectList.slideUp(0);
//     selectHead.on('click', function() {
//         if ( !$(this).hasClass('on') ) {
//             $(this).addClass('on');
//             selectList.slideDown(duration);

//             selectItem.on('click', function() {
//                 let chooseItem = $(this).data('value');

//                 $('select').val(chooseItem).attr('selected', 'selected');
//                 selectHead.text( $(this).find('span').text() );

//                 selectList.slideUp(duration);
//                 selectHead.removeClass('on');
//             });

//         } else {
//             $(this).removeClass('on');
//             selectList.slideUp(duration);
//         }
//     });
// });
// $(document).ready(function showAlert(btn) {
// var btn = $(".button_like");
// btn.click(function() {
// btn.toggleClass("paused");
// return false;
// });
// });
// $(function(){
//   $("#phone").mask("8(999) 999-9999");
// });
// document.addEventListener('DOMContentLoaded', function() {
//   // Получаем все элементы input
//   const inputs = document.querySelectorAll('input');

//   // Для каждого input добавляем обработчик события focus
//   inputs.forEach(input => {
//       input.addEventListener('focus', function() {
//           // Удаляем класс is-invalid
//           this.classList.remove('is-invalid');

//           // Удаляем текст ошибки, если он есть
//           const errorSpan = this.nextElementSibling;
//           if (errorSpan && errorSpan.classList.contains('text-danger')) {
//               errorSpan.style.display = 'none';
//           }
//       });
//   });
// });

  
