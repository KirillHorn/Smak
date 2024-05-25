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
$(function(){
  $("#phone").mask("8(999) 999-9999");
});

document.addEventListener('DOMContentLoaded', function() {
    var ratingResults = document.querySelectorAll('.rating-result');
  
    for (var i = 0; i < ratingResults.length; i++) {
      var ratingResult = ratingResults[i];
      var rating = ratingResult.getAttribute('data-rating');
      var spans = ratingResult.querySelectorAll('span');
  
      for (var j = 0; j < spans.length; j++) {
        var span = spans[j];
  
        if (j < rating) {
          span.classList.add('active');
        } else {
          span.classList.remove('active');
        }
      }
    }
  
    document.getElementById('comment').addEventListener('input', function() {
      const maxLength = 100;
      const remaining = maxLength - this.value.length;
      const charCount = document.getElementById('charCount');
      
      charCount.textContent = "Осталось символов: " + remaining;
      
      if (this.value.length > maxLength) {
        charCount.classList.add('red');
      } else {
        charCount.classList.remove('red');
      }
    });
  
    document.getElementById('comment-form').addEventListener('submit', function(e) {
      e.preventDefault();
  
      var form = this;
      var url = form.action;
      var data = new FormData(form);
      var comment = document.getElementById('comment').value;
      var errorDiv = document.getElementById('error');
  
      if (comment.length > 100) {
        errorDiv.textContent = "Отзыв не должен превышать 100 символов";
        errorDiv.style.display = 'block';
        return; // Prevent form submission if comment length exceeds 100
      } else {
        errorDiv.style.display = 'none';
      }
  
      fetch(url, {
        method: 'POST',
        body: data,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          addCommentToPage(data.comment);
          form.reset();
          document.getElementById('charCount').textContent = "Осталось символов: 100";
        } else {
          errorDiv.textContent = data.error;
          errorDiv.style.display = 'block';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        errorDiv.textContent = 'Произошла ошибка при отправке отзыва';
        errorDiv.style.display = 'block';
      });
    });
  
    function addCommentToPage(comment) {
      var template = document.getElementById('comment-template').innerHTML;
      var ratingStars = '';
  
      for (var i = 1; i <= 5; i++) {
        if (i == 1) {
          ratingStars += i <= comment.rating ? '<i class="fas fa-star purple-star"></i>' : '<i class="far fa-star purple-star"></i>';
        } else {
          ratingStars += i <= comment.rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
        }
      }
      var commentHtml = template
        .replace('__USERNAME__', comment.username)
        .replace(/__RATING__/, ratingStars)
        .replace('__COMMENT__', comment.comment);
  
      var commentsContainer = document.getElementById('comments-container');
      commentsContainer.insertAdjacentHTML('beforeend', commentHtml);
    }
  });
