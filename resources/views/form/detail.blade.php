<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Page</title>
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
<body>

    <style>
        .uper {
          margin-top: 40px;
        }
        /* img, video, object, embed {
    max-width: 100%;
    height: auto;
    overflow:hidden !important;
} */
      </style>
      <div class="uper">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div><br />
        @endif
        <table class="table table-striped">
          <thead>
              <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Age</td>
                <td>Country</td>
                <td>Gender</td>
                <td>City</td>
                <td>Address</td>
                <td>Hobbies</td>
                <td>Resume</td>
                <td colspan="2">Action</td>
              </tr>
          </thead>
          <tbody>
              @foreach($user as $records)
              <tr>
                  <td>{{$records->id}}</td>
                  <td>{{$records->name}}</td>
                  <td>{{$records->email}}</td>
                  <td>{{$records->age}}</td>
                  <td>{{$records->country}}</td>
                  <td>{{$records->gender}}</td>
                  <td>{{$records->city}}</td>
                  <td>{{$records->address}}</td>
                  <td>{{json_decode($records->hobbies)}}</td>
                  @if ($records->resume)
                  <td><img  src="{{ asset('uploads/files/'.$records->resume) }}"  style="width:50px;  height:50px; border:1px solid black; " >
                    {{-- <input type="hidden" id="copy"> --}}
                </td>

                  @else
                  <td><h4>No Img</h4></td>
                  @endif

                  {{-- <td><a href="{{ route('coronas.edit', $case->id)}}" class="btn btn-primary">Edit</a></td> --}}

                  <td>
                  @if(!empty($records->resume))

                        <a href="{{ url('download', $records->resume)}}" class="btn btn-primary">download</a>

                      @else
                      <a href="javascript:void(0)" class="btn btn-primary">Not available</a>
                      @endif
                    <input data-id="{{$records->id}}" class="toggle-class" type="checkbox"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle"  data-on="Active" data-off="InActive" {{ $records->status == 0  ? 'checked' : '' }} >
                  </td>

                  <td>

                        {{-- @dd(count((array)$item->like)) --}}
                        {{-- @if(count((array)$records->like) > 0) --}}

                        <?php $count = DB::table('like_unlikes')->sum('like');
                            // ->sum('like')
                        // ->orWhere('user_id','!=','unlike')->sum('unlike');
                         ?>
                    {{-- @dd(count((array)$count->like)) --}}
                        <?php $counts = DB::table('like_unlikes')
                        ->sum('unlike') ?>

                        {{-- @dd($count) --}}
                  {{-- @foreach ($count as $item)
            @if (count((array)$item->like) > 0) --}}
                        <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{$records->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                            Like
                            {{-- @dd($records->id | $count) --}}
                        <span class="like-count"  >{{$records->id }}</span>
                    </span>
                    {{-- @endif

               @if (count((array)$item->unlike) > 0) --}}

                    <span title="Dislikes" id="saveLikeDislike" data-type="unlike" data-post="{{$records->id}}"   class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
                        Dislike
                        <span class="dislike-count"  >{{ $counts}}</span>
                    </span>

                    {{-- @endif
               @endforeach --}}

          </td>

              </tr>
              @endforeach
          </tbody>
        </table>
      <div>

<script>



$(document).ready(function() {
    $('.toggle-class').change(function() {
        var status = $(this).val();

        // var status = $(this).prop('checked') === true ? 1 : 0; // also working two ways for do it
        var id = $(this).data('id');
    // alert(user_id);

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{route("change-status")}}',
            data: {
                'status': status,
                    'id': id
                },
            success: function(data){


                if(status = 1){
                toastr.success('User Active');
                }else{
                  toastr.warning('User InActive');
                }
            }


        });
    })
  })


  </script>


{{-- <script>

$(document).ready(function () {
    $(document).click("#copy", function (){
        var trial = $('img[alt="imgThumb1"]').attr('src');
        $("#copy").attr("src", trial);
        // alert(trial);

            } )
});

</script> --}}


<script>

$(document).on("click","#saveLikeDislike", function (e) {
    e.preventDefault();
    // alert("like");
    // var user_id = "{{Auth::id()}}";
    var type = $(this).data('type');
    var post = $(this).data('post');
    // var vm=$(this);

    // var unlike = $(this).data();


    $.ajax({
        type: "get",
        url: "{{route('hit-like')}}",
        data: {
            '_token':"{{ csrf_token() }}",
            // 'user_id':"{{Auth::id()}}",
           'type':type,
           'post':post
        },
        // dataType: "json",
        // beforeSend:function(){
        //     vm.addClass('disabled');
        // },
        success: function (like) {
            // if(like.bool == true){
            //     vm.removeClass('disabled').addClass('active');
            //     vm.removeAttr('id');
            //     var _prevCount=$("."+type+"-count").text();
            //     _prevCount++;
            //     $("."+type+"-count").text(_prevCount);
            }

    });

})

</script>


  <script>

  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

</body>
</html>
