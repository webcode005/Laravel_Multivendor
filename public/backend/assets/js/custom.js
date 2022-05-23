$(document).ready(function(){
    // check Admin password is correct or not

    $("#currentPassword").keyup(function(){
        var currentPassword = $("#currentPassword").val();
        // alert(currentPassword);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/admin/check-current-password',
            data:{currentPassword:currentPassword},
            success:function(resp)
            {
                if(resp == "false")
                {
                    $("#check_error").html("<font color='red'>Current Password is Incorrect!</font>");
                }
                else if(resp == "true")
                {
                    $("#check_error").html("<font color='green'>Current Password is Correct!</font>");
                }
            },error:function()
            {
                alert('Error');
            }

        });
    });

});

// Active / Inactive Vendor and Admin

$(document).on("click",".updateAdminStatus",function(){
    var status = $(this).children("span").attr("status");
    var admin_id = $(this).attr("admin_id");
    

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/admin/update-admin-status',
            data:{status:status,admin_id:admin_id},
            success:function(resp)
            {
                if(resp['status'] == 0)
                {
                    $("#admin-"+admin_id).html("<span class='badge bg-danger'  id='status' status='InActive'> InActive </span>");
                }
                else if(resp['status'] == 1)
                {
                    $("#admin-"+admin_id).html("<span class='badge bg-success'  id='status' status='Active'> Active </span>");
                }
            },error:function()
            {
                alert('Error');
            }

        });


});


// Active / Inactive Sections Status

$(document).on("click",".updateSectionStatus",function(){
    var status = $(this).children("span").attr("status");
    var section_id = $(this).attr("section_id");
    

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function(resp)
            {
                if(resp['status'] == 0)
                {
                    $("#section-"+section_id).html("<span class='badge bg-danger'  id='status' status='InActive'> InActive </span>");
                }
                else if(resp['status'] == 1)
                {
                    $("#section-"+section_id).html("<span class='badge bg-success'  id='status' status='Active'> Active </span>");
                }
            },error:function()
            {
                alert('Error');
            }

        });


});

// delete section simple js

// $(".deletesection").click(function(){
//     var title = $(this).attr("title");
//     if(confirm("Are You Sure to delete this " + title+"?"))
//     {
//         return true;
//     }
//     else
//     {
//         return false;
//     }

// });

// delete section sweetalert js

$(".deletesection").click(function(){
    var title = $(this).attr("title");
    if(confirm("Are You Sure to delete this " + title+"?"))
    {
        return true;
    }
    else
    {
        return false;
    }

});











