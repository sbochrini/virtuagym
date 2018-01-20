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
    var count_exercise=1;

    function addPlanDays() {
        count_day++;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType: "HTML",
            data: {'count_day': count_day},
            url: 'plans/addplanday',
            success: function (response) {
                if (count_day == 1) {
                    document.getElementById('ul_addplanday').innerHTML = response;
                } else {
                    $("#ul_addplanday").append(response);
                }
            },
            error: function (request, error) {
               // alert("Request: " + JSON.stringify(request));
            }
        });
    }

    function addExercise(id) {
        count_exercise++;
        var split_id=id.split("_");
        count_day=split_id[3];

        var elements= $('.exercise_container_'+count_day);
        var length = elements.length;
        var ele;
        elements.each(function(index, element) {
            if (index === (length - 1)) {
                ele=$(this);
                console.log('Last field, submit form here');
            }
        });
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType: "HTML",
            data: {
                'count_exercise': count_exercise,
                'count_day': count_day,
            },
            url: 'plans/addplanday',
            success: function (response) {
                ele.append(response);
            },
            error: function (request, error) {
               // alert("Request: " + JSON.stringify(request));
            }
        });

    }

    $(document).ready(function() {
        $(document).on('form_addplan', '#reg-form', function(e) {
            var data = $("#reg-form").serialize();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'plans/store"',
                data: data,
                success: function(data) {
                    alert("success");
                    console.log(data);
                },
                error: function(data) {
                    alert("error");
                }
            });
            return false;
        });
    });
</script>