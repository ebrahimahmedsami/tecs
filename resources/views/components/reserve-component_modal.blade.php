
<?php use App\Models\Clinic;
$clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
?>
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('home.reserve with us')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="modal-reserve-form">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-2">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('home.reservation data')}}</h5>
                            <div class="alert alert-danger capacity_error" style="display: none;"></div>
                            <div class="alert alert-success reservation_success" style="display: none;"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="modal_national_id" class="mb-1">{{__('home.national_id')}}</label>
                            <div class="position-relative has-icon-left">
                                <input type="number" id="modal_national_id"  class="form-control" name="modal_national_id" placeholder="{{__('home.national_id')}}"
                                       pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==14) return false;" min="11111111111111">

                                <div class="form-control-position">
                                    <i class="feather icon-grid"></i>
                                </div>
                                <span class="text text-danger" id="alert-length"></span>
                            </div>
                            <span class="text text-danger national_id_error"></span>
                        </div>

                        <div class="form-group col-6">
                            <label for="modal_date" class="mb-1">{{__('home.date')}}</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="modal_date" class="form-control" name="modal_date" placeholder="{{__('home.date')}}" min="{{date('Y-m-d')}}">
                                <div class="form-control-position">
                                    <i class="feather icon-grid"></i>
                                </div>
                            </div>
                            <span class="text text-danger date_error"></span>
                        </div>

                        <div class="form-group col-6">
                            <label
                                for="modal_type" class="mb-1">{{__('home.reserve_type')}}</label>
                            <select name="modal_type" id="modal_type"
                                    class="select2 form-control">
                                <option selected disabled>{{__('home.choose one')}}</option>
                                    @foreach(reservation_types() as $key=>$type)
                                        <option value="{{$key}}">{{$type}}</option>
                                    @endforeach
                            </select>
                            <span class="text text-danger type_error"></span>
                        </div>

                        <div class="form-group col-6">
                            <label for="modal_clinic_id" class="mb-1">{{__('home.clinic')}}</label>
                            <select name="modal_clinic_id" id="modal_clinic_id" class="select2 form-control clinic_id">
                                <option value="" disabled selected>{{__('home.choose one')}}</option>
                                @foreach($clinics as $clinic)
                                    <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                @endforeach
                            </select>
                            <span class="text text-danger clinic_id_error"></span>
                        </div>

                        <div class="form-group col-12 mb-5" id="specialization">
                            <label for="specialization_id" class="mb-1">{{__('home.specialization')}}</label>
                            <select name="modal_specialization_id" id="specialization_id" class="select2 form-control">
                            </select>
                            <span class="text text-danger specialization_id_error"></span>
                        </div>

                        {{--       New Patient         --}}
                        <div style="display: none" class="mb-2 mt-5 modal-patient-data row">
                            <h5 class="modal-title">{{__('home.patient data')}}</h5>
                            <span class="text-danger mb-2">({{__('home.new_patient')}})</span>
                            <div class="form-group col-6">
                                <label for="modal_name_ar" class="mb-1">{{__('home.name ar')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal_name_ar" class="form-control" name="name_ar" placeholder="{{__('home.name ar')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                <span class="text text-danger name_ar_error"></span>
                            </div>

                            <div class="form-group col-6">
                                <label for="modal_name_en" class="mb-1">{{__('home.name en')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal_name_en" class="form-control" name="name_en" placeholder="{{__('home.name en')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                <span class="text text-danger name_en_error"></span>
                            </div>

                            <div class="form-group col-6">
                                <label for="modal_phone" class="mb-1">{{__('home.phone')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative has-icon-left">
                                    <input type="number" id="modal_phone" class="form-control" name="phone" placeholder="{{__('home.phone')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                <span class="text text-danger phone_error"></span>
                            </div>

                            <div class="form-group col-6">
                                <label for="modal_address" class="mb-1">{{__('home.address')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal_address" class="form-control" name="address" placeholder="{{__('home.address')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                <span class="text text-danger address_error"></span>
                            </div>

                            <div class="form-group col-6">
                                <label for="modal_age" class="mb-1">{{__('home.age')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="position-relative has-icon-left">
                                    <input type="number" id="modal_age" class="form-control" name="age" placeholder="{{__('home.age')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                <span class="text text-danger age_error"></span>
                            </div>

                            <div class="form-group col-6">
                                <label
                                    for="modal_gender" class="mb-1">{{__('home.gender')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="gender" id="modal_gender"
                                        class="select2 form-control">
                                    <option selected disabled>{{__('home.choose one')}}</option>
                                        @foreach(gender() as $key=>$gender)
                                            <option value="{{$key}}">{{$gender}}</option>
                                        @endforeach
                                </select>
                                <span class="text text-danger gender_error"></span>
                            </div>
                        </div>
                        <div style="display: none" class="mb-2 mt-5 modal-patient-old-data row">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary send-reservation">
                        {{__('home.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function (){
            $('#specialization').hide();
            $('#modal_date').attr('disabled',true)
            $('#modal_type').attr('disabled',true)
            $('#modal_clinic_id').attr('disabled',true)
            $('#modal_clinic_id').on('change',function (){
                getSpecializations($('#modal_clinic_id').val());
            });

            $('#exampleModal').on('hidden.bs.modal', function () {
                $('.modal-patient-data').hide()
                $('.modal-patient-old-data').hide()
                $('#modal_date').val('').prop('disabled',true)
                $('#modal_type').val('').prop('disabled',true)
                $('#modal_clinic_id').val('').prop('disabled',true)
                $('#specialization').hide().val('').prop('disabled',true)
            })

            // Get Clinic Specializations
            function getSpecializations(selectedID = null){
                $('#specialization_id').empty()
                let clinicId = $('#modal_clinic_id').val();
                let url = '/admin/get_clinic_specializations'
                $.ajax({
                    url: url,
                    method: 'get',
                    data: {
                        id: clinicId,
                    },
                    success: function(result){
                        let specializations = result.data.specializations;
                        $('#specialization').show();
                        if(specializations.length > 0){
                            specializations.map((item) => {
                                $('#specialization_id').append(`
                                    <option ${selectedID && selectedID == item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>
                                `);
                            })
                        }
                    }});
            }

            // Check If patient Exist
            $('#modal_national_id').focusout(function (){
                let nationalId = $(this).val()
                if(nationalId.length != 14){
                    $('#modal_date').prop('disabled',true)
                    $('#modal_type').prop('disabled',true)
                    $('#modal_clinic_id').prop('disabled',true)
                    $('#specialization').hide().prop('disabled',true)
                    $('#alert-length').show().text("{{__('home.length must be equal 14')}}");
                    $('.modal-patient-data').hide()
                    $('.modal-patient-old-data').hide()
                    return false;
                }
                $('#modal_date').prop("disabled", false);
                $('#modal_type').prop("disabled", false);
                $('#modal_clinic_id').prop("disabled", false);
                $('#alert-length').empty().hide();
                $.ajax({
                    url: "{{route('home.checkPatientExistence')}}",
                    method: 'get',
                    data: {
                        national_id: nationalId,
                    },
                    success: function(result){
                       if (result.flag){
                           $('.modal-patient-data').hide()
                           $('.modal-patient-old-data').empty().show()
                               .append('<h5 class="modal-title">{{__('home.patient data')}}</h5>')
                               .append('<span class="text-success mb-2">({{__('home.old_patient')}})</span>')
                               .append(result.data)
                       }else{
                           $('.modal-patient-data').show()
                           $('.modal-patient-old-data').hide()
                       }
                    }});
            });

            // Start Reservation
            $('.send-reservation').on('click',function (e){
                e.preventDefault();
                $('.capacity_error').hide().empty()
                $('.reservation_success').hide().empty()
                $('.national_id_error').empty()
                $('.date_error').empty()
                $('.type_error').empty()
                $('.clinic_id_error').empty()
                $('.specialization_id_error').empty()
                $('.name_ar_error').empty()
                $('.name_en_error').empty()
                $('.phone_error').empty()
                $('.address_error').empty()
                $('.age_error').empty()
                $('.gender_error').empty()
                $.ajax({
                    url: "{{route('home.storeReservation')}}",
                    headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    method: 'post',
                    data: {
                        data: $('#modal-reserve-form').serialize(),
                    },
                    success: function(result){
                        $('.reservation_success').show().text(result.success)
                        setTimeout(function (){
                            location.reload()
                        },1000)
                    },
                    error: function (err){
                        let errors = err.responseJSON.errors;
                        if(errors) {
                            if (errors.modal_national_id)
                                $('.national_id_error').text(errors.modal_national_id[0])
                            if (errors.modal_date)
                                $('.date_error').text(errors.modal_date[0])
                            if (errors.modal_type)
                                $('.type_error').text(errors.modal_type[0])
                            if (errors.modal_clinic_id)
                                $('.clinic_id_error').text(errors.modal_clinic_id[0])
                            if (errors.modal_specialization_id)
                                $('.specialization_id_error').text(errors.modal_specialization_id[0])
                            if (errors.name_ar)
                                $('.name_ar_error').text(errors.name_ar[0])
                            // if (errors.name_en)
                            //     $('.name_en_error').text(errors.name_en[0])
                            if (errors.phone)
                                $('.phone_error').text(errors.phone[0])
                            if (errors.address)
                                $('.address_error').text(errors.address[0])
                            if (errors.age)
                                $('.age_error').text(errors.age[0])
                            if (errors.gender)
                                $('.gender_error').text(errors.gender[0])
                        }
                        if(err.responseJSON.error_capacity)
                            $('.capacity_error').show().text(err.responseJSON.error_capacity)
                    }
                });
            })
        });
    </script>
@endsection
