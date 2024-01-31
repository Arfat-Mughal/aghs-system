<!-- Jquery JS-->
<script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap4-toggle.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('admin_assets/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/select2/select2.min.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('admin_assets/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
        var i = 1;
        var j = 0;

        $('#add').click(function() {
            i++;
            j++;
            var subjectOptions = generateSubjectOptions();
            $('#dynamic_field').append(
                '<tr id="row' + i + '">' +
                '<td><select class="custom-select" name="subject_id[' + j + '][subject_id]">' +
                subjectOptions +
                '</select></td>' +
                '<td><input type="date" name="subject_id[' + j +
                '][date]" placeholder="Enter your Name" class="form-control name_list" /></td>' +
                '<td><input type="time" name="subject_id[' + j +
                '][reporting]" placeholder="Enter reporting time" class="form-control name_list" /></td>' +
                '<td><input type="time" name="subject_id[' + j +
                '][start_time]" placeholder="Enter start time" class="form-control name_list" /></td>' +
                ' <td><input type="time" name="subject_id[' + j +
                '][end_time]" placeholder="Enter end time" class="form-control name_list" /></td>' +
                '<td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">X</button></td>' +
                '</tr>'
            );
        });

        $('#addResult').click(function() {
            i++;
            j++;
            var subjectOptions = generateSubjectOptions();
            $('#dynamic_field_result').append(
                '<tr id="row' + i + '">' +
                '<td><select class="custom-select" name="subject_id[' + j + '][subject_id]">' +
                subjectOptions +
                '</select></td>' +
                '<td><input type="number" name="subject_id[' + j +
                '][marks]" placeholder="Enter your Name" class="form-control name_list" /></td>' +
                '<td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove_result">X</button></td>' +
                '</tr>'
            );
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $(document).on('click', '.btn_remove_result', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        function generateSubjectOptions() {
            var options = '';

            @if (isset($subjects))
                @foreach ($subjects as $subject)
                    options += '<option value="{{ $subject->id }}">{{ $subject->name }}</option>';
                @endforeach
            @endif

            return options;
        }

        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/student/changeStatus',
                    data: {
                        'is_active': status,
                        'id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })

        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 0; //initial text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div></br>' +
                    '<div class="col-4"><input type="text" placeholder="Details" name="fees[' + x +
                    '][detail]" class="form-control" required></div>' +
                    '<div class="col-4"><input type="text" placeholder="Amount" name="fees[' + x +
                    '][fee]" class="form-control" required> ' +
                    '</div><a href="#" class="remove_field btn btn-danger mt-2">Remove</a></div>'
                ); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
