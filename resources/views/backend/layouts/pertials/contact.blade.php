<div class="form-group col-md-6">
    <label for="faculty_name">@lang('Faculty Name') {{-- <span class="text-red">*</span> --}}</label>
    @php
     $faculties = App\Models\Faculty::all();
    @endphp
    <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" id="faculty_id">
      <option value="">@lang('Select')</option>
      @foreach ($faculties as $faculty )
          <option value="{{@$faculty->id}}" {{(@$editData->faculty_id == @$faculty->id)?"selected":""}}>{{@$faculty->name}}</option>
      @endforeach
    </select>
     @error('faculty_id')
     <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
  </div>

  <div class="form-group col-sm-6">
    @php
    if(!empty($editData) && !empty($editData->faculty_id))
    {
        $departmentInfos = \App\Models\Department::where('faculty_id',$editData->faculty_id)->get();
    }
    @endphp

    <label class="control-label">Department</label>
    <select id="department_id" class="form-control form-control-sm select2" name="department_id">
        <option value="">Select Department</option>
        @if(!empty($editData) && !empty($departmentInfos))
            @foreach($departmentInfos as $departmentInfo)
                <option @if( !empty($editData) && $editData->department_id == $departmentInfo->id) selected @endif value="{{ $departmentInfo->id }}">{{ $departmentInfo->name }}</option>
            @endforeach
        @endif
    </select>
    @error('department_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<script type="text/javascript">
    $(document).on('select change','#faculty_id',function(){
        var faculty_id = $('#faculty_id').val();
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: { faculty_id: faculty_id },
            success: function(data)
            {
                if(data != 'fail')
                {
                    $('#department_id').empty();
                    $('#department_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index,subcatObj){
                        $('#department_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
                    });
                }
                else
                {
                    console.log('failed');
                }
            }
        });
    });
</script>
