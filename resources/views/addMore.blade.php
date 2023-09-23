<!DOCTYPE html>
<html>
<head>
    <title>Add </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
   
<div class="container">
    
    <form action="{{ route('addmorePost') }}" method="POST">
        @csrf
   
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Qualification</th>
                <th>Action</th>
            </tr>
            <tr>  
                <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name" class="form-control" /></td>  
                <td>
                    <label><input type="radio" name="addmore[0][gender]" value="Male" /> Male</label>
                    <label><input type="radio" name="addmore[0][gender]" value="Female" /> Female</label>
                </td>
                <td>
                    <select name="addmore[0][qualification]" class="form-control">
                    <option value="">Enter your qualification</option>
                        <option value="Bachelor's Degree">B.Sc</option>
                        <option value="Master's Degree">M.Sc</option>
                        <option value="Ph.D.">Ph.D.</option>
                        <option value="MCA.">MCA</option>

                    </select>
                </td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
        </table> 
    
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<script>
$(document).ready(function () {
    var i = 0;

    
    $('#add').click(function () {
        i++;
        $('#dynamicTable').append(
            '<tr>' +
            '<td><input type="text" name="addmore[' + i + '][name]" placeholder="Enter your Name" class="form-control" /></td>' +
            '<td>' +
            '<label><input type="radio" name="addmore[' + i + '][gender]" value="Male" /> Male</label>' +
            '<label><input type="radio" name="addmore[' + i + '][gender]" value="Female" /> Female</label>' +
            '</td>' +
            '<td>' +
            '<select name="addmore[' + i + '][qualification]" class="form-control">' +
            '<option value="">Enter your qualification</option>' +
            '<option value="Bachelor\'s Degree">B.Sc</option>' +
            '<option value="Master\'s Degree">M.Sc</option>' +
            '<option value="Ph.D.">Ph.D.</option>' +
            '<option value="MCA.">MCA</option>' +
            '</select>' +
            '</td>' +
            '</tr>'
        );
    });

    
    $('#fetchData').click(function () {
        $.ajax({
            url: "{{ route('getData') }}",
            method: 'get',
            success: function (data) {
                if (data.length > 0) {
                    $('#dynamicTable tbody').empty();
                    for (var j = 0; j < data.length; j++) {
                        $('#dynamicTable tbody').append(
                            '<tr>' +
                            '<td>' + data[j].name + '</td>' +
                            '<td>' + data[j].gender + '</td>' +
                            '<td>' + data[j].qualification + '</td>' +
                            '</tr>'
                        );
                    }
                }
            }
        });
    });
});
</script>



  
</body>
</html>
