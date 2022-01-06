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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>

    <style>
            body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
        }
        .table-responsive {
        margin: 30px 0;
        }
        .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-width: 100%;
        }
        .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
        }
        .search-box {
        position: relative;
        float: right;
        }
        .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
        }
        .search-box input:focus {
        border-color: #3FBAE4;
        }
        .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
        }
        table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
        }
        table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
        }
        table.table td:last-child {
        width: 130px;
        }
        table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
        }
        table.table td a.view {
        color: #03A9F4;
        }
        table.table td a.edit {
        color: #FFC107;
        }
        table.table td a.delete {
        color: #E34724;
        }
        table.table td i {
        font-size: 19px;
        }
        .pagination {
        float: right;
        margin: 0 0 5px;
        }
        .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
        }
        .pagination li a:hover {
        color: #666;
        }
        .pagination li.active a {
        background: #03A9F4;
        }
        .pagination li.active a:hover {
        background: #0397d6;
        }
        .pagination li.disabled i {
        color: #ccc;
        }
        .pagination li i {
        font-size: 16px;
        padding-top: 6px
        }
        .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach($errors->all() as $error)
            <h2>{{$error}}</h2>
            @endforeach
        </div>
        <div class="col-md-4"></div>
    </div>
</div>



<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-1"><h2>Question List <b></b></h2></div>
                    <div class="col-sm-7"><Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button></div>
                    <div class="col-sm-4">
                        <div class="search-box">

                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>Question <i class="fa fa-sort"></i></th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ques as $question)


                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>

                        <td>
                            <a href="#" class="text-warning"   data-toggle="modal" data-target="#Modal_update{{$question->id}}">Update</a>
                            <a href="#" class="text-danger"   data-toggle="modal" data-target="#Modal_delete{{$question->id}}">Delete</a>

                        </td>
                    </tr>

                      {{-- delete --}}
                      <div class="modal fade" id="Modal_delete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <form action="{{url('delete-ques')}}" method="post">
                                  @csrf
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">


                                      <input type="hidden" name="id" value={{$question->id}}>
                                      <h4>Are you sure To delete Question...?</h4>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" value="Delete">
                            </div>

                          </div>
                           </form>
                        </div>
                      </div>


                    {{-- update --}}
                    <div class="modal fade" id="Modal_update{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <form action="{{url('update-ques')}}" method="post">
                                  @csrf
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="row">
                                          <h5 style="margin:10px">Question: </h5>
                                      </div>
                                      <input type="hidden" name="id" value={{$question->id}}>
                                      <div class="row"style="padding:10px">
                                          <input class="form-control" type="text" value="{{$question->question}}" name="question" required id="">
                                      </div>
                      <div class="row">
                          <div class="col-md-6"><Label>A:</Label></div>
                          <div class="col-md-6"><Label>B:</Label></div>
                      </div>
                      <div class="row">
                          <div class="col-md-6"><input type="text" value="{{$question->a}}" name="opa" required></div>
                          <div class="col-md-6"><input type="text" name="opb" value="{{$question->b}}" required></div>
                      </div>
                      <div class="row">
                          <div class="col-md-6"><Label>C:</Label></div>
                          <div class="col-md-6"><Label>D:</Label></div>
                      </div>
                      <div class="row">
                          <div class="col-md-6"><input type="text" name="opc" value="{{$question->c}}" required></div>
                          <div class="col-md-6"><input type="text" name="opd" value="{{$question->d}}" required></div>
                      </div>
                      <div class="row" style="margin: 5px">
                          <div class="col-md-3"><label for="">Answer</label>
                              <select name="ans" id="" class="form-control" required>
                                <option value="{{$question->ans}}">{{strtoupper($question->ans)}}</option>
                                  <option value="a">A</option>
                                  <option value="b">B</option>
                                  <option value="c">C</option>
                                  <option value="d">D</option>
                              </select>
                          </div>
                      </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" value="Update Question">
                            </div>

                          </div>
                           </form>
                        </div>
                      </div>

                      @endforeach
                    {{-- @endforeach --}}
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>

<!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <form action="{{url('add')}}" method="post">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="row">
                    <h5 style="margin:10px">Question: </h5>
                </div>
                <div class="row"style="padding:10px">
                    <input class="form-control" type="text" name="question" required id="">
                </div>
<div class="row">
    <div class="col-md-6"><Label>A:</Label></div>
    <div class="col-md-6"><Label>B:</Label></div>
</div>
<div class="row">
    <div class="col-md-6"><input type="text" name="opa" required></div>
    <div class="col-md-6"><input type="text" name="opb" required></div>
</div>
<div class="row">
    <div class="col-md-6"><Label>C:</Label></div>
    <div class="col-md-6"><Label>D:</Label></div>
</div>
<div class="row">
    <div class="col-md-6"><input type="text" name="opc" required></div>
    <div class="col-md-6"><input type="text" name="opd" required></div>
</div>
<div class="row" style="margin: 5px">
    <div class="col-md-3"><label for="">Answer</label>
        <select name="ans" id="" class="form-control" required>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Question">
      </div>

    </div>
     </form>
  </div>
</div>
<!-- Modal-Update -->

