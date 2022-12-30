
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
            <form  method="POST" id="modal-reserve-form">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-2">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('home.reservation data')}}</h5>
                        </div>
                        <div class="form-group col-6">
                            <label for="first-name-icon" class="mb-1">{{__('home.national_id')}}</label>
                            <div class="position-relative has-icon-left">
                                <input type="number" id="modal-national_id"  class="form-control" name="national_id" placeholder="{{__('home.national_id')}}"
                                       pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==14) return false;" min="11111111111111">

                                <div class="form-control-position">
                                    <i class="feather icon-grid"></i>
                                </div>
                                <span class="text text-danger" id="alert-length"></span>
                            </div>
                            @error('national_id')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="first-name-icon" class="mb-1">{{__('home.date')}}</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="modal-date" class="form-control" name="date" placeholder="{{__('home.date')}}" min="{{date('Y-m-d')}}">
                                <div class="form-control-position">
                                    <i class="feather icon-grid"></i>
                                </div>
                            </div>
                            @error('date')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label
                                for="first-name-icon" class="mb-1">{{__('home.reserve_type')}}</label>
                            <select name="type" id="type"
                                    class="select2 form-control">
                                <optgroup label="{{__('home.choose one')}}">
                                    @foreach(reservation_types() as $key=>$type)
                                        <option value="{{$key}}">{{$type}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('type')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label
                                for="first-name-icon" class="mb-1">{{__('home.clinic')}}</label>
                            <select name="clinic_id" id="clinic_id"
                                    class="select2 form-control clinic_id">
                                <optgroup label="{{__('home.choose one')}}">
                                    <option value="" disabled selected>{{__('home.choose one')}}</option>
                                    @foreach($clinics as $clinic)
                                        <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('clinic_id')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12 mb-5" id="specialization">
                            <label
                                for="first-name-icon" class="mb-1">{{__('home.specialization')}}</label>
                            <select name="specialization_id" id="specialization_id"
                                    class="select2 form-control">
                                <optgroup label="{{__('home.choose one')}}" id="specialization_id">
                                </optgroup>
                            </select>
                        </div>

                        <div class="mb-2 mt-2 modal-patient-data row">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('home.patient data')}}</h5>
                            <div class="form-group col-6">
                                <label for="first-name-icon" class="mb-1">{{__('home.name ar')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal-name_ar" class="form-control" name="name_ar" placeholder="{{__('home.name ar')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                @error('name_ar')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="first-name-icon" class="mb-1">{{__('home.name en')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal-name_en" class="form-control" name="name_en" placeholder="{{__('home.name en')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                @error('name_en')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="first-name-icon" class="mb-1">{{__('home.phone')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="number" id="modal-phone" class="form-control" name="phone" placeholder="{{__('home.phone')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                @error('phone')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="first-name-icon" class="mb-1">{{__('home.address')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="text" id="modal-address" class="form-control" name="address" placeholder="{{__('home.address')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                @error('address')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="first-name-icon" class="mb-1">{{__('home.age')}}</label>
                                <div class="position-relative has-icon-left">
                                    <input type="number" id="modal-age" class="form-control" name="age" placeholder="{{__('home.age')}}">
                                    <div class="form-control-position">
                                        <i class="feather icon-grid"></i>
                                    </div>
                                </div>
                                @error('age')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label
                                    for="first-name-icon" class="mb-1">{{__('home.gender')}}</label>
                                <select name="gender" id="type"
                                        class="select2 form-control">
                                    <optgroup label="{{__('home.choose one')}}">
                                        @foreach(gender() as $key=>$gender)
                                            <option value="{{$key}}">{{$gender}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('gender')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
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
            $('.modal-patient-data').hide();
            $('#clinic_id').on('change',function (){
                getSpecializations($('#clinic_id').val());
            });

            function getSpecializations(selectedID = null){
                $('#specialization_id').empty()
                let clinicId = $('#clinic_id').val();
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

            $('#modal-national_id').focusout(function (){
                let nationalId = $(this).val()
                if(nationalId.length != 14){
                    $('#alert-length').show().text("{{__('home.length must be equal 14')}}");
                    return false;
                }
                $('#alert-length').empty().hide();
                $.ajax({
                    url: "{{route('home.checkPatientExistence')}}",
                    method: 'get',
                    data: {
                        national_id: nationalId,
                    },
                    success: function(result){
                       // if (result.flag){
                       //
                       // }
                    }});
            });
        });
    </script>
@endsection
