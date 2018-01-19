<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            /*color: #636b6f;*/
            font-family: 'Raleway', sans-serif;
           /* font-weight: 100;*/
           /* height: 100vh;*/
            margin: 0;
        }

        .full-height {
            /*height: 100vh;*/
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        /*.links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }*/

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body style="background-image:url(https://static.virtuagym.com/v2952934/images/background1.png);">
@include('inc.navbar')
<div class="flex-center position-ref full-height">
    <div class="container">
        @yield('content')
        <footer id="footer" class="text-center">
            <hr>
            <p>Copyright &copy; 2018 VirtuaGym</p>
        </footer>
    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $("#btn_add_plan").on('click', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url: 'plans/addplanform',
                dataType:"HTML",
                success: function(response) {
                    document.getElementById('div_add_plan').innerHTML=response;
                }
            });
        });
    });

    var count_day=0;
    var count_exercise=0;
    var dropdown;
    function myCallback(response) {
        console.log(response);
        dropdown=response;
    }
    function addPlanDays() {
        var html_collapse='';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: 'plans/getexercises',
            success:myCallback
        });
        if(count_day==0){
            count_day++;
            html_collapse='<div class="collapse" id="planday_collapse_'+count_day+'">'+
                '<div class="card">'+
                '<div class="card-body">'+dropdown+
                '<p class="card-text"><small>Difficulty: </small></p>'+
                '<p class="card-text"><small>Duration: </small></p>'+
                '</div></div></div>';
            document.getElementById('ul_addplanday').innerHTML='<li id="li_'+count_day+'" class="list-group-item"><div class="form-group row"><label class="col-md-2 col-form-label">Day '+ count_day +'</label><div class="col-md-6"><input id="day_'+count_day+'" name="day_[]" type="text" class="form-control" placeholder=" Name"></div><div class="col-md-1 pl-1"><button type="button" class="btn btn-light"><i class="far fa-trash-alt"></i></button></div>'+
            '<div class="col-md-3"><a id="btn_addexercise" data-toggle="collapse" href="#planday_collapse_'+count_day+'" role="button" aria-expanded="false" aria-controls="planday_collapse_'+count_day+'"><i class="fa fa-plus fa-sm"></i><small> Add exercise</small></a></div></div></li>'+html_collapse;
        }else{
            count_day++;
            html_collapse='<div class="collapse" id="planday_collapse_'+count_day+'">'+
                '<div class="card">'+
                '<div class="card-body">'+
                '<p class="card-text"><small>Difficulty: </small></p>'+
                '<p class="card-text"><small>Duration: </small></p>'+
                '</div></div></div>';
            $("#ul_addplanday").append('<li id="li_'+count_day+'" class="list-group-item"><div class="form-group row"><label class="col-md-2 col-form-label">Day '+ count_day +'</label><div class="col-md-6"><input id="day_'+count_day+'" name="day_[]" type="text" class="form-control" placeholder=" Name"></div><div class="col-md-1 pl-1"><button type="button" class="btn btn-light"><i class="far fa-trash-alt"></i></button></div>'+
                '<div class="col-md-3"><a id="btn_addexercise" data-toggle="collapse" href="#planday_collapse_'+count_day+'" role="button" aria-expanded="false" aria-controls="planday_collapse_'+count_day+'"><i class="fa fa-plus fa-sm"></i><small> Add exercise</small></a></div></div></li>'+html_collapse);
        }
    }

    /*function addExercise() {
        if(count_exercise==0){
            console.log("zero");
            count_exercise++;
            document.getElementById('ul_addexersize').innerHTML='<li id="li_'+count_exercise+'" class="list-group-item"><div class="form-group row"><label class="col-md-3 col-form-label pr-0 pl-0">Day '+ count_exercise +'</label><div class="col-md-7 pr-0 pl-0"><input id="day_'+count_exercise+'" name="day_[]" type="text" class="form-control pr-0 pl-0" placeholder=" Name"></div><div class="col-md-2"><i class="far fa-trash-alt"></i></div></div></li>';
        }else{
            console.log("nozero");
            //var li_id="li_"+count;
            count_exercise++;
            $("#ul_addexersize").append('<li id="li_'+count_exercise+'" class="list-group-item"><div class="form-group row"><label class="col-md-3 col-form-label pr-0 pl-0">Day '+ count_exercise +'</label><div class="col-md-7 pr-0 pl-0"><input id="day_'+count_exercise+'" name="day[]" type="text" class="form-control pr-0 pl-0" placeholder=" Name"></div><div class="col-md-2"><i class="far fa-trash-alt"></i></div></div></li>');
        }
    }*/
</script>