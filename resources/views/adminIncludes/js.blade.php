<!-- Jquery JS-->
<script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap4-toggle.js')}}"></script>
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
        var j=0;
        $('#add').click(function(){
            i++;j++;
            $('#dynamic_field').append(
                '<tr id="row'+i+'">' +
                '<td><select class="custom-select" name="subject_id['+j+'][subject_id]">'+
                   ' <option selected="">Select option</option>'+
                    '<option value="1">ENGLISH</option>'+
                    '<option value="2">ENGLISH/W</option>'+
                    '<option value="3">ENGLISH/O</option>'+
                    '<option value="4">URDU</option>'+
                    '<option value="5">URDU/W</option>'+
                    '<option value="6">URDU/O</option>'+
                    '<option value="7">MATHEMATICS</option>'+
                    '<option value="8">MATH/W</option>'+
                    '<option value="9">MATH/O</option>'+
                    '<option value="10">DRAWING</option>'+
                    '<option value="11">TABLE BOOK</option>'+
                    '<option value="12">ISLAMIAT</option>'+
                    '<option value="13">ISLAMIAT READING</option>'+
                    '<option value="14">SCIENCE</option>'+
                    '<option value="15">PAK STUDY</option>'+
                    '<option value="16">GEOGRAPHY</option>'+
                    '<option value="17">G.SCIENCE</option>'+
                    '<option value="18">BIOLOGY</option>'+
                    '<option value="19">COMPUTER</option>'+
                    '<option value="20">PHYSICS</option>'+
                    '<option value="21">ISLAMIAT ELECTIVE</option>'+
                    '<option value="22">CHEMISTRY</option>'+
                    '<option value="23">EDUCATION</option>'+
                    '<option value="24">PUNJABI</option>'+
                    '<option value="25">CIVICS</option>'+
                    '<option value="26">G.K</option>'+
                    '<option value="27">BIOLOGY/COMPUTER</option>'+
                    '<option value="28">HOME WORK</option>'+
                    '<option value="29">ISLAMIAT TRANSLATION</option>'+
                    '<option value="30">ISLAMIAYT TARJUMA</option>'+
                    '<option value="31">ONE MINUTE TARBIYAH</option>'+
                '</select></td>' +
                '<td><input type="date" name="subject_id['+j+'][date]" placeholder="Enter your Name" class="form-control name_list" /></td>'+
                '<td><input type="time" name="subject_id['+j+'][reporting]" placeholder="Enter reporting time" class="form-control name_list" /></td>'+
                '<td><input type="time" name="subject_id['+j+'][start_time]" placeholder="Enter start time" class="form-control name_list" /></td>'+
                ' <td><input type="time" name="subject_id['+j+'][end_time]" placeholder="Enter end time" class="form-control name_list" /></td>'+
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                '</tr>');
        });

        $('#addResult').click(function(){
            i++;j++;
            $('#dynamic_field_result').append(
                '<tr id="row'+i+'">' +
                '<td><select class="custom-select" name="subject_id['+j+'][subject_id]">'+
                ' <option selected="">Select option</option>'+
                ' <option selected="">Select option</option>'+
                '<option value="1">ENGLISH</option>'+
                '<option value="2">ENGLISH/W</option>'+
                '<option value="3">ENGLISH/O</option>'+
                '<option value="4">URDU</option>'+
                '<option value="5">URDU/W</option>'+
                '<option value="6">URDU/O</option>'+
                '<option value="7">MATHEMATICS</option>'+
                '<option value="8">MATH/W</option>'+
                '<option value="9">MATH/O</option>'+
                '<option value="10">DRAWING</option>'+
                '<option value="11">TABLE BOOK</option>'+
                '<option value="12">ISLAMIAT</option>'+
                '<option value="13">ISLAMIAT Reading</option>'+
                '<option value="14">SCIENCE</option>'+
                '<option value="15">PAK STUDY</option>'+
                '<option value="16">GEOGRAPHY</option>'+
                '<option value="17">G.SCIENCE</option>'+
                '<option value="18">BIOLOGY</option>'+
                '<option value="19">COMPUTER</option>'+
                '<option value="20">PHYSICS</option>'+
                '<option value="21">ISLAMIAT ELECTIVE</option>'+
                '<option value="22">CHEMISTRY</option>'+
                '<option value="23">EDUCATION</option>'+
                '<option value="24">PUNJABI</option>'+
                '<option value="25">CIVICS</option>'+
                '<option value="26">G.K</option>'+
                '<option value="27">BIOLOGY/COMPUTER</option>'+
                '<option value="28">HOME WORK</option>'+
                '<option value="29">ISLAMIAT TRANSLATION</option>'+
                '<option value="30">ISLAMIAYT TARJUMA</option>'+
                '<option value="31">ONE MINUTE TARBIYAH</option>'+
                '</select></td>' +
                '<td><input type="number" name="subject_id['+j+'][marks]" placeholder="Enter your Name" class="form-control name_list" /></td>'+
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_result">X</button></td>' +
                '</tr>');
        });


        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $(document).on('click', '.btn_remove_result', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/student/changeStatus',
                    data: {'is_active': status, 'id': user_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })

            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 0; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div></br>' +
                        '<div class="col-4"><input type="text" placeholder="Details" name="fees['+x+'][detail]" class="form-control" required></div>' +
                        '<div class="col-4"><input type="text" placeholder="Amount" name="fees['+x+'][fee]" class="form-control" required> ' +
                        '</div><a href="#" class="remove_field btn btn-danger mt-2">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })

    } );
</script>
