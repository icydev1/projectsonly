<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<!-- JavaScript Bundle with Popper -->

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script> --}}

    <title>Document</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
            {{-- <form action="{{url('store-form')}}" method="POST" enctype="multipart/form-data"> --}}
                <form action="" method="post" id="studentForm" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <td>
                            <label for="uname">Name</label>
                        </td>
                        <td >
                            <input class="form-control"  type="text" id="uname" name="uname">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="uemail">Email</label>
                        </td>
                        <td>
                            <input class="form-control" type="email" id="uemail" name="uemail">
                            {{-- <button type="button">Check</button> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="age">Age</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="age" id="age" size="2" maxlength="2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Country</label>
                        </td>
                        <td>
                            <input class="form-control" id="country" type="text" value="" name="country" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                                <label for="pass">Password</label>
                        </td>
                        <td>
                                <input class="form-control" name="pass" type="password" id="pass">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="res">Resume</label>
                        </td>
                        <td>
                            <input class="form-control" name="file" type="file" id="file">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Hobbies</label>
                        </td>
                        <td>
                            <label>
                                <input name="check" id="check" value="Cricket" type="checkbox" > Cricket
                            </label>
                            <label>
                                <input name="check" id="check" value="Football" type="checkbox"> Football
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Gender</label>
                        </td>
                        <td>
                            <label>
                                <input  type="radio" id="gender" value="female" name="gender"> Female</label>
                                <label>
                                <input  value="male" id="gender" type="radio" name="gender"> Male</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                                <label for="city">City</label>
                        </td>
                        <td>
                                <select id="city" id="city" name="city">
                                    <option disabled selected>--Choose City--</option>
                                        <optgroup label="Metros">
                                            <option>New Delhi</option>
                                            <option>Mumbai</option>
                                            <option>Channai</option>
                                            <option>Kolkata</option>
                                        </optgroup>
                                        <optgroup label="Others">
                                            <option>Noida</option>
                                            <option>Gurgram</option>
                                            <option>Faridabad</option>
                                            <option>Gaziabad</option>
                                        </optgroup>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address</label>
                        </td>
                        <td>
                            <textarea name="address" id="address" rows="4" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input  type="submit" id="submitbtn" value="Submit">
                            <input id="cform" type="reset">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</div>


<script>

    // $(document).ready(function (e) {

        $(document).on("submit","#studentForm",function (e) {
        e.preventDefault();



            // alert(e);
            var uname = $("#uname").val();
            var uemail = $("#uemail").val();
            var age = $("#age").val();
            var country = $("#country").val();
            var pass = $("#pass").val();
            var gender = $("input[name='gender']:checked").val();
            var check = [];

         $("input[name=check]:checked").each(function() {

            check.push($(this).val());
            // alert(check)
            // JSON.stringify(check);

        });

        // alert(formData);

            var address = $("#address").val();
            var city = $("#city").val();
            // var _token = $("input[name=_token]").val();

            var file = $("#file")[0].files[0];
            var formData = new FormData();
            formData.append('file', file);
            formData.append('uname', uname);
            formData.append('uemail', uemail);
            formData.append('age', age);
            formData.append('gender', gender);
            formData.append('pass', pass);
            formData.append('city', city);
            formData.append('check', check);
            formData.append('country', country);
            formData.append('address', address);





            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

                 $.ajax({
                type: "post",
                url: "{{route('store')}}",
                data:formData,

                    cache:false,
                    contentType: false,
                    processData: false,

                success: function (res) {
                    $("#studentForm")[0].reset();
                }
            })




        });
        // } );



</script>

</body>
</html>
