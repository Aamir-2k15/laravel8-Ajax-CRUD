<!doctype html>
<html lang="en">

<head>
    <title>CRUD</title>
    <!-- required="required" meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fontawesome.com/v4.7/assets/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"/>
    <style>
        #records_holder #row_body {
            /* display: block; */
            max-width: 70ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container mt-4 pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">CRUD</h3>

            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div id="response" class="alert alert-dismissible fade show" role="alert"></div>
            </div>
            <div class="col-md-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right ml-auto mr-0" data-toggle="modal"
                    data-target="#add_modal">
                    <i class="fa fa-folder"></i>
                    Add Post
                </button>

                <!-- Modal -->
                <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="create_post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Post</h5>
                                    @csrf
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control required" name="title" id="title"
                                            aria-describedby="helpId" placeholder="Title" required/>
                                        <span class="form-text error-response"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea class="form-control required" name="body" id="body" rows="3"
                                            placeholder="Body" required></textarea>
											<span class="form-text error-response"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="create">
                                        <i class="fas fa-save"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Ends Modal -->

            </div>
        </div>

        <div class="row mt-4 pt-4">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover table-striped table-bordered table-inverse table-full">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="records_holder">


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View -->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label for="title">Title</label> -->
                        <h5 id="title_show"> </h5>
                    </div>

                    <div class="form-group">
                        <!-- <label for="body">Body</label> -->
                        <p id="body_show"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ends View -->



    <!-- Edit -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control required" name="title" id="title_edit"
                                aria-describedby="helpId" placeholder="Title" required/>
							<span class="form-text error-response"></span>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body" id="body_edit" rows="3"
                                placeholder="Body" required></textarea>
							<span class="form-text error-response"></span>	
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="the_id" name="id" value="" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update">
                            <i class="fas fa-update"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Modal -->


    <!-- Delete -->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="delete_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">Are you sure you want to delete this?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="delete_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="delete_button" class=" btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                            Yes delete it</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Modal -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            //GET ALL RECORDS
            get_records();
			
        });//END DOC READYs
		//
		//ALL RECORDS
        function get_records() {
            let records_holder = $('tbody#records_holder');

            $.ajax({
                //debugger;
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/article',
                type: "get",
                dataType: "json",
                async: false
                // data: form_data,
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                //response = JSON.parse(response);
                console.log(response);
                if (response.Status == 1) {
                    // records_holder.html('test');
                    records_holder.html(response.articles);
                } else {
                    ErrorMsg();
                }
            }); //ajax done

        }//ends get_records
        //Success Message        
        function SuccessMsg(msg) {
            //let close_btn =    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $('#response').addClass('alert-success').html(msg).show().delay(2500).fadeOut();
        }
        //Error Message        
        function ErrorMsg(msg) {
            $('#response').addClass('alert-danger').html(msg).show().delay(2500).fadeOut();
        }



        $(document).on('click', '#create',  function (event) {
            
            let form = $('form#create_post');
            let form_data = form.serialize();
            //console.log(form_data);
			if(form.val() ==""){
			event.preventDefault();
			}
            $.ajax({
                //debugger;
                // url: '/article/store',
                url:"{{route('article.store')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: "json",
                //                    async: false
                data: form_data,
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                // console.log(response);
                if (response.Status == 1) {
                    SuccessMsg(response.MSG);
                    $('form#create_post')[0].reset();
                    $("#add_modal").modal('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    get_records();
                } else {
                    ErrorMsg(response.MSG);
                    $('form#create_post')[0].reset();
                    $('#add_modal').modal('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            }); //ajax done


        });//ENDS CREATE

        //VIEW
        // VIEW INIT
        $(document).on('click', '.view', function () {
            let id = $(this).data('id');
            console.log(id);
            // debugger;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/article/'+id,
                type: "get",
                dataType: "json",
                //                    async: false
                data: { id: id },
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                console.log(response);
                if (response.Status == 1) {
                    $('#view').modal('show');
                    $('#title_show').html(response.article.title);
                    $('#body_show').html(response.article.body);
                }
            }); //ajax done

        }); // VIEW ENDS
        //EDIT
        $(document).on('click', '.edit', function () {
            let id = $(this).data('id'), title = $('#title').val(), body = $('#body').val();
            $('#edit_modal').modal('show');
            console.log(id);
            // debugger;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/article/'+id+'/edit',
                type: "get",
                dataType: "json",
                //                    async: false
                data: { id: id },
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                console.log(response);
                if (response.Status == 1) {
                    $('#edit_modal').modal('show');
                    // debugger;
                    $('#edit_modal #title_edit').val(response.article.title);
                    $('#edit_modal #body_edit').val(response.article.body);
                    $('#edit_modal #the_id').val(response.article.id);
                }

            }); //ajax done
        });//ENDS EDIT
        //UPDATE
        $(document).on('click', '.update', function (event) {
            event.preventDefault();
            let id = $('#the_id').val(), title = $('#title').val(), body = $('#body').val();
            let form_data = $('form#edit_form').serialize();
            console.log(id);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/article/'+id,
                type: 'PUT',
                dataType: "json",
                //                    async: false
                data: form_data,
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                // console.log(response);
                if (response.Status == 1) {
                    SuccessMsg(response.MSG);
                    $("#edit_modal").modal('hide');
                    get_records();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                } else {
                    ErrorMsg(response.MSG);
                    $("#edit_modal").modal('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            }); //ajax done
        });
        //DELETE MODAL
        $(document).on('click', '.delete', function () {
            $("#delete_modal").modal('show');
            $("#delete_modal #delete_id").val($(this).data('id'));
        });
        //DELETE PROCESS
        $("#delete_button").on('click',  function (event) {
            event.preventDefault();
            let id = $('#delete_form #delete_id').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/article/'+id,
                type:'DELETE',
                dataType: "json",
                //                    async: false
                data: { id: id },
                //                    beforeSend: ez_loading_func()
            }).done(function (response) {
                // debugger;
                // console.log(response);
                if (response.Status == 1) {
                    SuccessMsg(response.MSG);
                    $("#delete_modal").modal('hide');
                    get_records();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                } else {
                    ErrorMsg(response.MSG);
                    $("#delete_modal").modal('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            }); //ajax done
        });//ends delete

    </script>
</body>

</html>