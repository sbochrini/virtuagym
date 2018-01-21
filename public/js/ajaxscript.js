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
    /*$(document).on('form_addplan', '#reg-form', function(e) {*/
    $('#form_addplan').on('submit', function(e) {
        var data = $("#form_addplan").serialize();
        var html="";
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'plans/store',
            data: data,
            dataType: 'json',
            mimeType: "multipart/form-data",
            success: function(response) {
                /* $.get('plans/store', function(){
                 $("#plans_ul").prepend(response);
                 });*/
               /* html='<li class="list-group-item mb-1"><div class="row"><div class="col-md-auto"><img src="gym2.png" style="height: 117px; width: 117px;">'+
                    '</div><div class="col"><div class="row"><div class="col"><div class="card-title">'+response.plan_name+'</div></div>'+
                    '<div class="col"><button class="btn btn-default btn-sm">Edit</button></div></div><div class="row"><div class="col">'+
                    '<a data-toggle="collapse" href="#plan_collapse'+response.id+'" role="button" aria-expanded="false" aria-controls="plan_collapse'+response.id+'">'+
                    '<small>Info</small></a><div class="collapse" id="plan_collapse'+response.id+'"><div class="card"><div class="card-body">'+
                    '<p class="card-text"><small>Difficulty: '+response.plan_difficulty+'</small></p><p class="card-text"><small>Description: '+response.plan_description+'</small></p>'+
                    '</div></div></div></div></div></div></div></li>';*/
                $("#plans_ul").prepend(response);
                //fetchItems();
            },
            error: function(data) {
                alert("error");
            }
            /*complete: function(response){
             $("#plans_ul").prepend(response);
             }*/
        });

        /*$.get('plans/store', function(response){
         $("#plans_ul").prepend(response);
         });*/
        return false;
    });
});

// Fetching items
var fetchItems = function() {
    $.ajax({
        type: "GET",
        url: "plans/planli",
        success: function(response) {
            $("#plans_ul").prepend(response);;
        },
        error: function(error) {
            alert("Error fetching items: " + error);
        }
    });
}