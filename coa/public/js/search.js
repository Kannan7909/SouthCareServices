/* $(document).ready(function(){
    $("search").keydown(function(){
            $value=$(this).val();
            if($value){
                $('.allData').hide();
                $('.searchData').show();
            }
            else{
                $('.allData').show();
                $('.searchData').hide();
            }
            $.ajax({
                type:'get',
                url: MY_PROJECT.search_ajax,
                data:{'search':$value},
        
                success:function(data){
                    console.log(data);
                    $('#content').html(data);
                }
            })
          });
  }); */