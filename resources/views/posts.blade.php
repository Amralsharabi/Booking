@extends('layouts.app')

@section('content')
    <form>
    {{-- <div class="form-group">
        <label for="country">الدولة</label>
        <select class="form-control" id="country" name="country">
            <option value="">اختر دولة</option>
            <!-- اختيارات الدول -->
        </select>
    </div> --}}
    <div class="form-group">
        <label for="governorate">المحافظة</label>
        <select class="form-control" id="governorate" name="governorate">
            <option value="">اختر محافظة</option>
            <!-- اختيارات المحافظات -->
        </select>
    </div>
    <div class="form-group">
        <label for="directorate">المديرية</label>
        <select class="form-control" id="directorate" name="directorate">
            <option value="">اختر مديرية</option>
            <!-- اختيارات المديريات -->
        </select>
    </div>
    <div class="form-group">
        <label for="center">المركز</label>
        <select class="form-control" id="center" name="center">
            <option value="">اختر مركز</option>
            <!-- اختيارات المراكز -->
        </select>
    </div>
</form>
@endsection

@push('scripts')
    <script>
    $(document).ready(function() {
        // استدعاء الدول من الخادم عند تحميل الصفحة
        $.ajax({
            url: "{{ route('Location.index') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // إضافة اختيارات الدول إلى حقل الدولة
                $.each(data, function(key, value) {
                    $('#country').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });

    

        // استدعاء المحافظات المرتبطة بالدولة المختارة
        $('#country').change(function() {
            var countrie_nationalit_id = $(this).val();
            if (countrie_nationalit_id) {
                $.ajax({
                    url: "{{ route('getGovernoratesByCountry') }}",
                    type: "POST",
                    data: {
                        countrie_nationalit_id: countrie_nationalit_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        // إضافة اختيارات المحافظات إلى حقل المحافظة
                        $('#governorate').empty().append('<option value="">اختر محافظة</option>');
                        $.each(data, function(key, value) {
                            $('#governorate').append('<option value="' + key + '">' + value + '</option>');
                        });
                        // إفراغ حقول المديرية والمركز
                        $('#directorate').empty().append('<option value="">اختر مديرية</option>');
                        $('#center').empty().append('<option value="">اختر مركز</option>');
                    }
                });
            } else {
                // إفراغ جميع حقول الاختيارات
                $('#governorate').empty().append('<option value="">اختر محافظة</option>');
                $('#directorate').empty().append('<option value="">اختر مديرية</option>');
                $('#center').empty().append('<option value="">اختر مركز</option>');
            }
        });

        // $(document).ready(function() {
        // // استدعاء المحافظات من الخادم عند تحميل الصفحة
        // $.ajax({
        //     url: "{{ route('Location.index') }}",
        //     type: "GET",
        //     dataType: "json",
        //     success: function(data) {
        //         // إضافة اختيارات المحافظات إلى حقل المحافظات
        //         $.each(data, function(key, value) {
        //             $('#governorate').append('<option value="' + key + '">' + value + '</option>');
        //         });
        //     }
        // });

        // استدعاء المديريات المرتبطة بالمحافظة المختارة
        $('#governorate').change(function() {
            var province_id = $(this).val();
            if (province_id) {
                $.ajax({
                    url: "{{ route('getDirectoratesByGovernorate') }}",
                    type: "POST",
                    data: {
                        province_id: province_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        // إضافة اختيارات المديريات إلى حقل المديرية
                        $('#directorate').empty().append('<option value="">اختر مديرية</option>');
                        $.each(data, function(key, value) {
                            $('#directorate').append('<option value="' + key + '">' + value + '</option>');
                        });
                        // إفراغ حقل المركز
                        $('#center').empty().append('<option value="">اختر مركز</option>');
                    }
                });
            } else {
                // إفراغ حقول المديرية والمركز
                $('#directorate').empty().append('<option value="">اختر مديرية</option>');
                $('#center').empty().append('<option value="">اختر مركز</option>');
            }
        });

        // استدعاء المراكز المرتبطة بالمديرية المختارة
        $('#directorate').change(function() {
            var directorate_id = $(this).val();
            if (directorate_id) {
                $.ajax({
                    url: "{{ route('getCentersByDirectorate') }}",
                    type: "POST",
                    data: {
                        directorate_id: directorate_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        // إضافة اختيارات المراكز إلى حقل المركز
                        $('#center').empty().append('<option value="">اختر مركز</option>');
                        $.each(data, function(key, value) {
                            $('#center').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                // إفراغ حقل المركز
                $('#center').empty().append('<option value="">اختر مركز</option>');
            }
        });
    });
</script>
@endpush
