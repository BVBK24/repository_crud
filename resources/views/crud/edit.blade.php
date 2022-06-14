<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" href="CSS/bootstrap.css">-->
    <style>
       .error
       {
           color: red;
            font-style:italic;
       }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Curd Operations</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Edit Your Data</h2>
                    </div>
                        <div class="card-body">
                            <form method="post" id="register" action="{{route('patcrud.update',$crud->id)}}">
                            
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" class="form-control mb-2" placeholder="id" value="{{$crud->id}}" ></input>
                                <input type="text" name="firstname" class="form-control mb-2" placeholder="firstname" value="{{$crud->firstname}}"></input>
                                <input type="text" name="lastname" class="form-control mb-2" placeholder="lastname" value="{{$crud->lastname}}" ></input>
                                <input type="text" name="mail" class="form-control mb-2" placeholder="email" value="{{$crud->mail}}" ></input>
                                <input type="text" name="phone" class="form-control mb-2" placeholder="phone" value="{{$crud->phone}}" ></input>
                            
                            
                        </div>
                    <div class="card-footer">
                        <input type="submit" name="Update" value="Update" class="btn btn-success" onclick='return confirm("save the update?")'></input>
                        </form>
                        <button value="Back" class="btn btn-success">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    {{-- <script src="{{ asset('js/register.js') }}"></script> --}}

</body>
</html>