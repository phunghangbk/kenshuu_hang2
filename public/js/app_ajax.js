var flag = 0;
$("#btnTweet").click(function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: '/addArticle',
    data: { 
      '_token': $('input[name=_token]').val(),
      'content': $('textarea[name=content]').val(),},
      success: function(msg) {
        if(msg.errors)
        {
          $('.error').removeClass('hidden');
          $('.error').text(msg.errors.content[0]);
        }else{
          $('.error').addClass('hidden');
          $('#articleList').prepend(msg);
          flag++;
        }
    }
  }).fail(function(jqXHR, ajaxOptions, thrownError)
  {
    alert('server not responding...');
  });
  $('#content').val('');
});

var page = 2;
$("#load_more_button").click(function (e) {
  $.ajax(
  {
    url: '?page=' + page,
    type: 'get',
    data: {
      'countAddTweet': flag,
    },
    success: function(data) {
      $("#load_more").append(data.view);
      console.log(data.t);
      if(data.lastPage === page){
        $('.load_more_button').html("No more records found");
        $('#load_more_button').hide();
      }
      page++;
    }
  }).fail(function(jqXHR, ajaxOptions, thrownError)
  {
    alert('server not responding...');
  });
});
