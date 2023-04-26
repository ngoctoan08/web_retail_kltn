$(document).ready(function () {
    $('.list_employee').DataTable({
        order: [[0, 'asc']],
    });

    $('.list_course').DataTable({
        order: [[0, 'asc']],
    });
    
    $('.list_bill').DataTable({
        order: [[1, 'asc']],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                autoFilter: true,
                title: 'Danh sách hóa đơn',
                messageTop: 'Danh sách hóa đơn'
            },
            {
                extend: 'pdfHtml5',
                autoFilter: true,
                title: 'Danh sách hóa đơn',
                messageTop: 'Danh sách hóa đơn'
            },
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="./images/icon/icon-shortcut-logo.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    });
});


function sendRequest(dataRequest, selectorResult)
{
    var options = {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(dataRequest) // body data type must match "Content-Type" header
    }
    // Fetch API 
    fetch(dataRequest.url, options)
        .then((response) => response.json())
        .then((data) => {
            if (data.status == 200) {
                handleSuccessRespone(selectorResult, data.html)
            } 
        })
}

// handle onchange department
$(document).ready(function () {
    $('.change_department').on('change', function() {
        var selectedOption = $(this).find("option:selected");
        var departmentId = selectedOption.attr('departmentId');
        var url = "index.php?page=employee&method=getPosition"
        data = {url, departmentId};
        sendRequest(data, '#position');
    });

    $('.change_department_1').on('change', function() {
        var departmentName = $(this).val();
        var url = "index.php?page=employee_result&method=get_employee"
        data = {url, departmentName};
        sendRequest(data, '#employee');
    });

    $('.change_employee').on('change', function() {
        var employeeId = $(this).val();
        var url = "index.php?page=employee_result&method=get_course"
        data = {url, employeeId};
        sendRequest(data, '#course');
    });
});

// Xử lý kết quả ajax trả về
function handleSuccessRespone(selectorResult, result)
{
    // inner html
    $(selectorResult).empty();
    if(data.html != '') {
        $(selectorResult).html(result)
        // $('#position').append(data.html);
    }
    else{
        $(selectorResult).empty();
    }
}
// handle upload img


$(document).ready(function(){
    // Lắng nghe sự kiện khi người dùng chọn ảnh
    document.getElementById('avatar').click();
    $('#avatar').change(function(event){
        console.log(123);
        var files = event.target.files;
        for (var i = 0; i < files.length; i++) {
            var imageUrl = URL.createObjectURL(files[i]);
            var img = $('<img>').attr('src', imageUrl);
            $('#uploadedImages').append(img);
        }
    });
});


// request
function deleteItem(request) {
    var options = {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(request) // body data type must match "Content-Type" header
    }
    // Fetch API 
    fetch(request.url, options)
        .then((response) => response.json())
        .then((data) => {
            if (data.status == 200) {
                alertSuccess(data.message);
                $('#item_' + request.id).remove();
            } 
        })
}


function handleDelete()
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('data-id');
            var url = $(this).attr('url'); //
            var request = {id, url};
            deleteItem(request);
        }
      })
}

$(document).ready(function(){
    // $('.del_item').on('click', handleDelete);
    $('.del_item').on('click', handleDelete);
});

