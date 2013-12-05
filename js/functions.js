$(document).ready(function(){
  $("#var1").each(function(){
    $(this).bind('keyup', hoge(this));
  });
  function hoge(elm){
    var v, old = elm.value;
    return function(){
      if(old != (v=elm.value)){
        old = v;
        str = $(this).val();
        $(".tate-line").text(str);
      }
    }
  }
  $('#submit').click(function(){
    var name = $('#name').val();
    var waka = $('#var1').val();
    var address = $('#address').val();
    //console.log(name);
    //console.log(waka);
    //console.log(address);
    $('#loading').append('<img src = "./images/loading.gif">');
    $.post('post.php',{name:name,waka:waka,address:address},
      function(data){
        if(data != 'error1'){
            $('#postArea').html('<div id = "after-post"><p class = "waka-post-success">投稿に成功しました</p><br /><p id = "button"><a href= "http://wakamongp.jp/post.html"><button class="btn btn-info btn-large"><i class="icon-white icon-pencil"></i>もう一度投稿する</button></a></p><p id = "button"><a href= "http://wakamongp.jp/"><button class="btn btn-info btn-large"><i class="icon-white icon-pencil"></i>トップへ戻る</button></a></p></div>');
          }else if(data = 'error1'){
            $('#waka-form-input .error').html('');
            $('#waka-form-input .error').append('すべての欄に記入してください。');
            $('#loading').html(' ');
          }
      });
  });
  
  $.post('recentPost.php',
    function(data){
      //console.log(data);
      var data = JSON.parse(data); 
      //console.log(data);
      for(d in data){  
        console.log(data[d]); 
        $('#recent-post').fadeIn(1000).append('<p class = "each-waka">'+data[d]['waka']+'</p>');
       }
    });
});
