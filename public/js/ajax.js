 // $(document).ready(function(){
 //    $('.quantity').click(function(){
 //        $.ajax({
 //          url : 'ajax',
 //          type : "post",
 //          dateType:"text",
 //          data : {
 //               id_product: $(this).attr("rel"), _token: $('#token').val(), number: $('#notification').text()
 //          },
 //          success : function (result){
 //              $('#notification').html(result);
 //          }
 //        });
 //    });
 //     });
 
    $(document).on('click','.quantity',function(){
      $.ajax({
          url : 'ajax',
          type : "post",
          dateType:"text",
          data : {
               id_product: $(this).attr("rel"), _token: $('#token').val(), number: $('#notification').text()
          },
          success : function (result){
              $('#notification').html(result);
          }
      });
      if ($(this).attr('class')== 'btn btn-warning quantity') {
        $(this).attr('class','btn btn-success quantity');
        $(this).text('Uncheck');
      }else{
        $(this).attr('class','btn btn-warning quantity');
        $(this).text('Chek');
      }

    });
  // $(document).ready(function(){
  // 	$('.quantity').click(function(){
  // 		if ($(this).attr('class')== 'btn btn-warning quantity') {
  // 			$(this).attr('class','btn btn-success quantity');
  // 			$(this).text('Uncheck');
  // 		}else{
  // 			$(this).attr('class','btn btn-warning quantity');
  // 			$(this).text('Chek');
  // 		}
  // });


  // });
 $(document).on('click','#delete',function(e){
    var r = confirm("Press a button!");
    if (r == true) {
        $('#form_delete').submit();
      // $ajax({
      //   url:$('#form_delete').val(),
      //   type:'delete',
      //   dateType:'text',
      //   data:{ },
      // success: function(result){
      //    $('#list-acc').html(result);
      // }
      // })
    }
    e.preventDefault();

 });

  // $(document).ready(function(){
  //   $('#add').click(function(){
  //     $.ajax({
  //       url: 'search',
  //       type: 'get',
  //       dateType: 'text',
  //       data: {
  //           search: '123'
  //       },
  //       success: function(result){
  //         $('#result').html(result);
  //       }
  //     })
  //   });

  // });

    $(document).on('click','.pagination li a',function(e){
        //var myurl = $(this).attr('href');
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        var search;
        if (search = $(this).attr('href').split('search=')[1]) {
          search = search.split('&')[0];
            $.ajax({
        url: 'search',
        type: 'get',
        dateType: 'text',
        data: {
            page: page ,search: search
        },
        success: function(result){
          $('#list-acc').html(result);
        }
      })
        }else
      $.ajax({
        url: '',
        type: 'get',
        dateType: 'html',
        data: {
            page: page
        },
        success: function(result){
          $('#list-acc').html(result);
          window.history.pushState({path:url},'',url);
        }
      })
    });

    $(document).on('click','#search',function(){
      $.ajax({
        url: '',
        type: 'get',
        dateType: 'html',
        data: {
            search: $('#data').val()
        },
        success: function(result){
          $('#list-acc').html(result);
        }
      })
    });


