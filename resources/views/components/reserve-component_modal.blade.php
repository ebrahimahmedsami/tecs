
<?php use App\Models\Clinic;
$clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('home.reserve with us')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  method="POST" id="modal-reserve-form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name-icon">{{__('home.national_id')}}</label>
                        <div class="position-relative has-icon-left">
                            <input type="number" id="modal-national_id" class="form-control" name="national_id" placeholder="{{__('home.national_id')}}"
                                   pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==14) return false;" min="11111111111111">
                            <div class="form-control-position">
                                <i class="feather icon-grid"></i>
                            </div>
                        </div>
                        @error('national_id')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="first-name-icon">{{__('home.date')}}</label>
                        <div class="position-relative has-icon-left">
                            <input type="date" id="modal-date" class="form-control" name="date" placeholder="{{__('home.date')}}">
                            <div class="form-control-position">
                                <i class="feather icon-grid"></i>
                            </div>
                        </div>
                        @error('date')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label
                            for="first-name-icon">{{__('home.reserve_type')}}</label>
                        <select name="type" id="type"
                                class="select2 form-control">
                            <optgroup label="{{__('home.choose one')}}">
                                <option value="0">{{__('home.reserve_type_select')}}</option>
                                <option value="1">{{__('home.discovery_type_select')}}</option>
                            </optgroup>
                        </select>
                        @error('type')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label
                            for="first-name-icon">{{__('home.clinic')}}</label>
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

                    <div class="form-group" id="specialization">
                        <label
                            for="first-name-icon">{{__('home.specialization')}}</label>
                        <select name="specialization_id" id="specialization_id"
                                class="select2 form-control">
                            <optgroup label="{{__('home.choose one')}}" id="specialization_id">
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{__('dashboard.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function (){
            alert(2);
            $('#clinic_id').on('change',function (){
                console.log($('#clinic_id').val());
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
                        if(specializations.length > 0){
                            specializations.map((item) => {
                                $('#specialization_id').append(`
                                    <option ${selectedID && selectedID == item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>
                                `)
                            })
                        }
                    }});
            }
        });
    </script>
@endsection
