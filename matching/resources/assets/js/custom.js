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
      console.log(data)
    }).fail(function(data) {
      console.log(data)
    })
  })
})
