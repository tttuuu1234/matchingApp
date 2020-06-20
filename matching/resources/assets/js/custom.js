$(function() {
  $('#profile').click(function() {
    if($(this).attr('class') == 'clicked') {
      $(this).removeClass('clicked')
      $('.dropdown-lists').slideUp('fast')
    } else {
      $(this).addClass('clicked');
      $('.dropdown-lists').slideDown('fast')
    }
  })
})

$(function() {
  $('#modal-open').click(function() {
    $('#modal').show();
  })
  $('#modal-close').click(function() {
    $('#modal').hide();
  })
  $('#modal-bg-close').click(function() {
    $('#modal').hide();
  })
})

// user検索
$(function() {
  $('#ajaxSearchUser').click(function() {
    $.ajax({
      url: './users/search',
      type: 'GET',
      dataType: 'json',
      data: {
        'prefecture': $('#prefecture').val(),
        'sex': $('input[name="sex"]:checked').val(),
        'matching_age':{
          'matching_age_from': $('#matchingAgeFrom').val(),
          'matching_age_to': $('#matchingAgeTo').val()
        }
      },
    }).done(function(data) {
      $('#modal').hide();
      // 指定した要素の子要素を削除
      $('#usersBox').empty()
      // 検索結果を画面に反映
      for (let i = 0; i < data.length; i++) {
        const user = data[i];
        $('#usersBox').append("<li class='user-list'><div class='d-flex'><div class='user-icon-box'><i class='fas fa-user user-icon'></i></div><div><div class='d-flex'><p class='user-name'>"+ user.user_name +"</p><p class='user-age ml-2'>"+ user.age +"</p><p class='user-prefecture ml-2'>"+ user.prefecture_name +"</p></div><div><p class='user-profile'>"+ user.profile +"</p></div></div></div><div class='d-flex justify-content-between'><div class='user-matching'><input type='hidden' name='match_id' value='"+ user.id +"' id='matchUser"+ user.id +"'><button class='btn btn-vioret w-auto btn-match'>マッチング希望</button></div><div class='user-report'><button class='btn btn-danger'>通報</button></div></div></li>")
      }
    }).fail(function(data) {
      console.log(data)
    })
  })
})

// マッチング希望送信
$(function() {
  console.log('dddd')
  $(document).on('click', '.btn-match', function() {
    console.log('aaaaa')
    let matchReciverId = $(this).prev('input[name="match_id"]')
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: './user/match',
      type: 'POST',
      dataType: 'json',
      data: {
        'match_reciver_id': matchReciverId.val()
      }
    }).done(function(data) {
      console.log(data.match_reciver_id)
      console.log(matchReciverId.val())
      if (data.match_reciver_id == matchReciverId.val()) {
        const matchUser = $('#'+'matchUser' + matchReciverId.val())
        matchUser.next('button').remove()
        matchUser.after('<p>承認結果待ち</p>')
      }
    }).fail(function(data) {
      // console.log(data)
    })
  })
})
