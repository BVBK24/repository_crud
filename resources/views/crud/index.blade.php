<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .error
        {
            color: red;
            font-style:italic;
        }
        .addMore
        {
            
            transition: all ease-in-out 0.2s;
            cursor: pointer;
        }
        .addMore:hover
        {
            border: 1px solid #888;
            background-color: #ddd;
        }
    </style>
    <!--<link rel="stylesheet" href="CSS/bootstrap.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Curd Operations</title>
</head>
<body class="bg-dark">
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Record</button>
                        <div><h2 style="margin-left:325px">Saved Records</h2></div></div>
                    </div>
                    <div class="mt-3">
                        <!-- Filter part-->
                        <form class="form-inline" method="get" action="{{route('patcrud.index')}}">
                            @csrf
                            <label for="category_filter">Filter by &nbsp;</label>
                            <select class="form-control" id="category_filter" name="category">
                                <option>Select Column</option>
                                <option value="global">Global</option>
                                <option value="id">ID</option>
                                <option value="firstname">Firstname</option>
                                <option value="lastname">Lastname</option>
                                <option value="mail">Mail</option>
                                <option value="phone">Phone</option>
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" id="keyword"/>
                            <span>&nbsp;</span>
                            <button type="submit" class="btn btn-primary" name="search">Search</button>
                            
                        </form>
                        
                    </div><br>
                    <div>
                    <label for="category_filter">No of records fetched <b>{{$crud->count()}}</b></label>
                    </div>
                    {{-- session msg for inserting rows --}}
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    {{-- end session msg for inserting rows --}}
                    <!-- success msg for updation find below-->
                    @if(Session::has('upload_success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('upload_success')}}
                    </div>
                    @endif
                    @if(Session::has('upload_fail'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('upload_fail')}}
                    </div>
                    @endif
                    @if(Session::has('alert'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('alert')}}
                    </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <!--Column level filter and table headers-->
                                <td style="width: 10%">ID
                                    <div>
                                        <i class="fa fa-angle-up addMore" title="Ascending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_asc_id')}}';"></i>
                                        <i class="fa fa-angle-down addMore" title="descending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_desc_id')}}';"></i>
                                    </div>
                                    {{-- <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" >Ascending</button>
                                                <button type="submit" class="dropdown-item" >Descending</button>
                                            </div>
                                        </div> --}}
                                    </td>
                                <td style="width: 15%">Firstname
                                    <div>
                                        <i class="fa fa-angle-up addMore" title="ascending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_asc_fn')}}';"></i>
                                        <i class="fa fa-angle-down addMore" title="descending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_desc_fn')}}';"></i>
                                    </div>
                                    {{-- <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item">Ascending</button>
                                                <button type="submit" class="dropdown-item">Descending</button>
                                            </div>
                                        </div> --}}
                                </td>
                                <td style="width: 15%">Lastname
                                    <div>
                                        <i class="fa fa-angle-up addMore" title="ascending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_asc_ln')}}';"></i>
                                        <i class="fa fa-angle-down addMore" title="descending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_desc_ln')}}';"></i>
                                    </div>
                                    {{-- <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" >Ascending</button>
                                                <button type="submit" class="dropdown-item" >Descending</button>
                                            </div>
                                    </div> --}}
                                </td>
                                <td style="width: 13%">MailId
                                    <div>
                                        <i class="fa fa-angle-up addMore" title="ascending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_asc_ml')}}';"></i>
                                        <i class="fa fa-angle-down addMore" title="descending"style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_desc_ml')}}';"></i>
                                    </div>
                                    {{-- <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" >Ascending</button>
                                                <button type="submit" class="dropdown-item" >Descending</button>
                                            </div>
                                    </div> --}}
                                </td>
                                <td style="width: 13%">Phone
                                    <div>
                                        <i class="fa fa-angle-up addMore" title="ascending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_asc_ph')}}';"></i>
                                        <i class="fa fa-angle-down addMore" title="descending" style="float:right; font-size:24px" onclick="location.href='{{route('getResult','sort_desc_ph')}}';"></i>
                                    </div>
                                    {{-- <div class="dropdown" style="float:right;">
                                        <button style="width: 100%; text-align:right" class="btn btn-info btn-sm dropdown-toggle" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="submit" class="dropdown-item" >Ascending</button>
                                                <button type="submit" class="dropdown-item" >Descending</button>
                                            </div>
                                    </div> --}}
                                </td>
                                <td style="width: 15%"><div class="text-center">Operations</div></td>
                            </tr>
                            @if($crud->count()>0)
                            @foreach($crud as $cru)
                            <tr>
                                <td>{{$cru->id}}</td>
                                <td>{{$cru->firstname}}</td>
                                <td>{{$cru->lastname}}</td>
                                <td>{{$cru->mail}}</td>
                                <td>{{$cru->phone}}</td>
                                <td>
                                    <div class="dropdown text-center">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                                                <a class='dropdown-item' href="{{route('patcrud.edit',$cru->id)}}">Update</a>
                                                <form method="post" action='{{action('CrudController@destroy',$cru->id)}}'>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class='dropdown-item' onclick='return confirm("do you want to delete?")'>Delete</button>
                                                </form>
                                            </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                            @else
                            <td colspan='6' style="text-align:center">{{"no recods found"}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                        {{-- Create Record --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  id="register" method="post" action="{{action('CrudController@store') }}">
                                    @csrf
                                    <div class="form-group"> 
                                        <label for="recipient-name" class="col-form-label">Firstname</label>
                                        <input type="text" class="form-control"  name="firstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Lastname</label>
                                        <input type="text" class="form-control" name="lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Mail</label>
                                        <input type="text" class="form-control" name="mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Phone</label>
                                        <input type="text" class="form-control"  name="phone">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save Record</button>
                                     </form>
                                </div>
                            </div>
                        </div>
                </div>
                {{-- end create record --}}
            </div>
        </div>
    </div>
    
    <div class="mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            {{$crud->links()}}
        </ul>
    </nav>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
    {{-- //$(document).ready(function(){
        //$(document).on('click','.editbtn',function(){
            //var stud_id=$(this).val();
            //$('#editModal').model('show');
        //});
    //});
    //$('document').ready(function() {
        //$('#btnTest').click(function() {
            //$('#editModel').modal({show:true});
  //});
//}); --}}
</body>
</html>