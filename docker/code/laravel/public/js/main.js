$(function() {
  'use strict';

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // users.show

  $('.delete_word').on('click', function () {
    var id = $(this).data('id');
    if (confirm('本当に削除しますか?')) {
      $.ajax({
        url: '/words/' + id,
        type: 'POST',
        data: {
          'word_id': id,
          '_method': 'DELETE'
        }
      })
        .done((data) => {
          $('#word_' + id).fadeOut(800);
        }).fail((data) => {
          alert('通信に失敗しました');
      })
    }
  });

  //words.test
  $('#answer_btn').on('click', function () {
    var answer = $('#answer');
    answer.css('display', 'block');
  });

  //words.index
  $('.like_word').on('click', function () {
    if ($(this).hasClass('after_favo')) {
      var id = $(this).data('id');
      if (confirm('本当にお気に入り解除しますか?')) {
        $.ajax({
          url: '/words/' + id + '/like',
          type: 'POST',
          data: {
            'word_id': id,
            'type': 'remove',
          }
        })
          .done((data) => {
            if (data.failedMsg) {
              $('#msg').html(data.failedMsg);
            } else {
              $('#msg').html('<p>お気に入り解除に成功しました</p>');
              $('#like_' + id).removeClass('after_favo');
              $('#like_' + id).html("お気に入り登録");
              console.log('remove_succeed');
            }
          }).fail((data) => {
            alert('通信に失敗しました');
          })
        }
    } else {
      var id = $(this).data('id');
      if (confirm('本当にお気に入り登録しますか?')) {
        $.ajax({
          url: '/words/' + id + '/like',
          type: 'POST',
          data: {
            'word_id': id,
            'type': 'add'
          }
        })
          .done((data) => {
            if (data.failedMsg) {
              $('#msg').html(data.failedMsg);
            } else {
              $('#msg').html('<p>お気に入り登録に成功しました</p>');
              $('#like_' + id).addClass('after_favo');
              $('#like_' + id).html("お気に入り解除");
              console.log('add_succeed');
            }
          }).fail((data) => {
            alert('通信に失敗しました');
          })
        }
    }
  });

  //users.search(cleanArcでは未実装)
//   $('#search').on('click', function () {
//     var search_word = $('#search_word').val();
//     $("#search_result").html('');
//     $('#msg').html('');
//     console.log(search_word);
//     $.ajax({
//       url: '/users/search',
//       type: 'POST',
//       data: {
//         'search_word': search_word
//       }
//     })
//     .done((data) => {
//       if (data.users) {
//         console.log(data.users);
//         $('#msg').html('<p>該当するユーザーがいます！！！</p>');
//         setSearchResult(data.users);
//       } else {
//         alert('該当するユーザーがおりません');
//       }
//     }).fail((data) => {
//       alert('通信に失敗しました');
//     })
//   });

//   function setSearchResult(users) {
//       $.each(users, function (index, value) {
//           var detail_link = "/users/" + value.id;
//           $("#search_result").append(
//               "<tr><th>" + value.name + "</th><th><a href=" + detail_link + " >" + "詳細" + "</a></th></tr>"
//           );
//     })
//   }
});
