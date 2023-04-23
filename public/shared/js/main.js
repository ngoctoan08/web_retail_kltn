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


function changeDepartment()
{
    
}
// handle onchange department
$(document).ready(function () {
    $('.change_department').on('change', function() {
        var selectedOption = $(this).find("option:selected");
        var departmentId = selectedOption.attr('departmentId');
        var url = "http://localhost/quan_ly_nhan_su/index.php?page=employee&method=getPosition"
        data = {url, departmentId};
        var options = {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(data) // body data type must match "Content-Type" header
        }
        // Fetch API 
        fetch(data.url, options)
            .then((response) => response.json())
            .then((data) => {
                if (data.status == 200) {
                    // inner html
                    $('#position').empty();
                    if(data.html != '') {
                        $('#position').html(data.html)
                        // $('#position').append(data.html);
                    }
                    else{
                        $('#position').empty();
                    }
                } 
            })
    });
});

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

