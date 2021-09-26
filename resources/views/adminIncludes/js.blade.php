<!-- Jquery JS-->
<script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/select2/select2.min.js')}}">
</script>

<!-- Main JS-->
<script src="{{asset('admin_assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
        var i=1;
        var j=1;
        $('#add').click(function(){
            i++; j++;
            $('#dynamic_field').append(
                '<tr id="row'+i+'">' +
                '<td><select class="custom-select" name="grade_id[]">'+
                   ' <option selected="">Select option</option>'+
                    '<option value="1">science</option>'+
                    '<option value="2">islamiat</option>'+
                    '<option value="3">english</option>'+
                    '<option value="4">mathematics</option>'+
                    '<option value="5">urdu</option>'+
                    '<option value="6">geography</option>'+
                    '<option value="7">islamiat reading</option>'+
                    '<option value="8">table book</option>'+
                '</select></td>' +
                '<td><input type="date" name="grade_id[date]" placeholder="Enter your Name" class="form-control name_list" /></td>'+
                '<td><input type="text" name="grade_id[reporting]" placeholder="Enter reporting time" class="form-control name_list" /></td>'+
                '<td><input type="text" name="grade_id[start_time]" placeholder="Enter start time" class="form-control name_list" /></td>'+
                ' <td><input type="text" name="grade_id[end_time]" placeholder="Enter end time" class="form-control name_list" /></td>'+
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                '</tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    } );
</script>
