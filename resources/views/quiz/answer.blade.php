<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script> --}}

</head>
{{-- <body oncontextmenu="return false;"> --}}

    <body>

<div class="container-fluid">
    <form action="{{url('submitans')}}" method="post">
        @csrf
    <div class="row text-center" style="padding-top:30vh">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <h4> # {{Session::get('nextquestion')}} : <strong> {{$question->question}} </strong></h4>
            <br>
            <input value="a" type="radio" name="ans" id=""> (A) <small>{{$question->a}}</small><br>
            <input value="b" type="radio" name="ans" id=""> (B) <small>{{$question->b}}</small><br>
            <input  value="c"  type="radio" name="ans" id=""> (C) <small>{{$question->c}}</small><br>
            <input value="d" type="radio" name="ans" id=""> (D) <small>{{$question->d}}</small><br>
            <input type="hidden" value="{{$question->ans}}" name="dbans">
        </div>
        <div class="col-md-5"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary" style="float: right">Next</button></a>
        </div>
        <div class="col-md-5"></div>
    </form>
    </div>
</div>

<script>
// document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.view-source: ==  (0)) {
//      return false;
//   }
// }




</script>

</body>
</html>
