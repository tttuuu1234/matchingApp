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
})
