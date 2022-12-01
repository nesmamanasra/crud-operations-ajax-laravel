<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.add_product',function(e){
             e.preventDefault();
             let name = $('#name').val();
             let price = $('#price').val();
             //console.log(name+price);
             $.ajax({
                url:"{{ route('add.product')}}",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status == 'success'){
                        $('#exampleModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },error:function(err){
                    $('.errMsgContainer').html('');
                   let error = err.responseJSON;
                   $.each(error.errors,function(index, value){
                       $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+ '<br>');
                   });
                }
             });
        });

        // show data in update form
          $(document).on('click','.updateProductForm',function(e){
                  let id = $(this).data('id');
                  let name = $(this).data('name');
                  let price = $(this).data('price');


                  $('#updateId').val(id);
                  $('#updateName').val(name);
                  $('#updatePrice').val(price)

          });

        // update data after edit
        $(document).on('click','.update_product',function(e){
             e.preventDefault();
             let updateId = $('#updateId').val();
             let updateName = $('#updateName').val();
             let updatePrice = $('#updatePrice').val();
             //console.log(name+price);
             $.ajax({
                url:"{{ route('update.product')}}",
                method:'post',
                data:{updateId:updateId,updateName:updateName,updatePrice:updatePrice},
                success:function(res){
                    if(res.status == 'success'){
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },error:function(err){
                    $('.errMsgContainer').html('');
                   let error = err.responseJSON;
                   $.each(error.errors,function(index, value){
                       $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+ '<br>');
                   });
                }
             });
        });

        // delete data 
        $(document).on('click','.deleteProduct',function(e){
             e.preventDefault();
             let productId =$(this).data('id');
            //    alert(productId); alert id product
             if(confirm('Are you sure to delete product')){
                    $.ajax({
                    url:"{{ route('delete.product')}}",
                    method:'post',
                    data:{productId:productId},
                    success:function(res){
                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');
                        }
                    }
                });
             }
        });

          // pagination data 
          $(document).on('click','.pagination a',function(e){
             e.preventDefault();   
             let page = $(this).attr('href').split('page=')[1]
             product(page)
           });
          
           function product(page){
               $.ajax({
                url:"/pagination/paginate-data?page="+page,
                success:function(res){
                     $('.table-data').html(res);
                }
               });
           }
    });
 </script>