<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do</title>
<!-- CSS only -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<!-- JavaScript Bundle with Popper -->

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script> --}}


</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">


            <div class="panel panel-default">
                <div class="panel-heading text-center">Ajax Todo List <a href="#" id="addNew" class="pull-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                <div class="panel-body">
                    <ul class="list-group" id="show">
                    @foreach ($list as $item)
                        <li  class="list-group-item ourItem" data-toggle="modal" data-target="#addModal">{{$item->todo_name}}
                            <input type="hidden" id="itemId" name="" value="{{$item->id}}">
                        </li>
                    @endforeach

                    </ul>


                </div>

              </div>


        </div>
    </div>
</div>

@csrf

<script>

$(document).ready(function (){
    $(document).on("click",'.ourItem', function(e){
        e.preventDefault();
// $('.ourItem').each(function (){
    // $(this).click(function(){
    var text = $(this).text();
    var id = $(this).find('#itemId').val();

    $('#title').text('Edit Item')
    var text = $.trim(text);
    $('#addTodoItem').val(text);
    $('#delete').show('400');
    $('#saveChange').show('400');
    $('#addButton').hide();
    $('#id').val(id);

    console.log(text);
// })
// })
    })


$(document).on('click','#addNew', function(e){

    // $('#addNew').click(function(){
    $('#title').text('Add New Item')
    $('#addTodoItem').val("");
    $('#delete').hide('400');
    $('#saveChange').hide('400');
    $('#addButton').show();
// })


})

$('#addButton').click(function (e){
    var text = $('#addTodoItem').val();
    if(text == ""){
alert("plz enter text")
    }else{
        $.post("add-todo",{'text' : text,
        '_token':$('input[name=_token]').val()

},function(data){
        $('#show').load(location.href + ' #show');
   })
    }

})
$('#delete').click(function(e){
    var id = $('#id').val();
    $.post('delete',{'id':id ,'_token':$('input[name=_token]').val()},function(data){
        $('#show').load(location.href + ' #show');
        console.log(data);

    })
})
$('#saveChange').click(function(e){
    var id = $('#id').val();
    var update = $('#addTodoItem').val();

    $.post('update',{'id':id ,'update':update, '_token':$('input[name=_token]').val()},function(data){
        $('#show').load(location.href + ' #show');
        console.log(data);

    })
})




})


</script>



</body>
</html>

{{-- add modal --}}

<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="title">Add New Item</h4>
        </div>
        <input type="hidden" id="id" name="">

        <div class="modal-body">
            <p class="enterText"></p>
          <p> <input type="text" name="text" placeholder="add item here" id="addTodoItem" class="form-control"> </p>
        </div>
        <div class="modal-footer">
          <button type="button" id="delete" class="btn btn-warning pull-left" data-dismiss="modal"  style="display: none">Delete</button>
          <button type="button"  class="btn btn-primary" id="saveChange" data-dismiss="modal" style="display: none">Save Changes</button>
          <button type="button" id="addButton" class="btn btn-primary" data-dismiss="modal">Add Item</button>
        </div>
