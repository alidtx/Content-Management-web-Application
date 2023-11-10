<div class="col-lg-4 ">
    <div class="shadow-sm p-3 mb-3 bg-light rounded program-type">
        <h1 class="mt-3">Program Type</h1>
        <form class="filter-form">


          @php 
            $pall = App\Models\Program::count('program_category_id');
          @endphp
            <div class="program-text d-flex justify-content-between align-items-center mt-3">
              <label for="program_id2222" class=" d-flex">
                <input type="radio" ref="program" checked value="" name="program_category_id" id="program_id2222">
                <h1 class="title"> All</h1> 
                <p class="number">{{$pall}}</p>
              </label>
            </div>
          @foreach($program_categories as $key => $pc)
          @php
            $a = App\Models\Program::where('program_category_id', $pc->id)->count('program_category_id');
          @endphp
            <div class="program-text d-flex justify-content-between align-items-center mt-3">
                <input type="radio" ref="program" value="{{$pc->id}}" name="program_category_id" id="program_id{{$key}}" >
              <label for="program_id{{$key}}" class=" d-flex">  
                <h1 class="title"> {{$pc->program_category}}</h1>
                <p class="number">{{$a}}</p>
              </label>
            </div>
          @endforeach
       
        </div>

        <div class="shadow-sm p-3 mb-3 bg-light rounded program-type mt-4">
          <h1 class="mt-3">Faculty of</h1>
          @php 
            $fall = App\Models\Program::count('faculty_id');
          @endphp
            <div class="program-text d-flex justify-content-between align-items-center mt-3">
              <label for="faculty_id2222" class=" d-flex">
                <input type="radio" ref="faculty" checked value="" name="faculty_id" id="faculty_id2222">
                <h1 class="title"> All</h1> 
                <p class="number">{{$pall}}</p>
              </label>
            </div>
          @foreach($faculties as $key => $f)
          @php
            $b = App\Models\Program::where('faculty_id', $f->id)->count('faculty_id');
          @endphp
            <div class="program-text d-flex justify-content-between align-items-center mt-3">
                <input type="radio" ref="faculty" value="{{$f->id}}" name="faculty_id" id="faculty_id{{$key}}"> 
              <label for="faculty_id{{$key}}" class=" d-flex">
                <h1 class="title">{{$f->name}}</h1>
                <p class="number">{{$b}}</p>
              </label>
            </div>
          @endforeach
 
        </form>

    </div>
</div>


<script>
 
    
    addEventListener('click',(e)=>{
      if(e.target.getAttribute("ref")=="faculty" || e.target.getAttribute("ref")=="program"){
          console.log(e.target.value)
          // console.log(document.querySelector('input[name="faculty_id"]:checked').value)
          // console.log(document.querySelector('input[name="program_category_id"]:checked').value)
          $.ajax({
            url: 'academics_srch',
            type: 'POST',
            dataType: 'json',
            data: {
              program:document.querySelector('input[name="program_category_id"]:checked')==null ? null : document.querySelector('input[name="program_category_id"]:checked').value,
              faculty:document.querySelector('input[name="faculty_id"]:checked')==null ? null : document.querySelector('input[name="faculty_id"]:checked').value,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
              console.log(data)
                // $('#data_communicated_teachers').html('');
                // load_communicated_teachers();
                
                let html='';
                for(let i=0;i<data.length;i++){
                  //console.log(data[i]['program_title'])
                  html+=`<div class="academics-card shadow-sm p-3 mb-3 bg-light rounded col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="academics-card-icon text-center mt-4">
                            <a href="academics/academics_details/${data[i]['id']}">
                                <img class="rounded" src="{{ asset('public/frontend/assets/img/academics/card-icon (5).png') }}" alt="icon">
                                <h1 class="fs-6 text-center text-primary mt-2">${data[i]['program_category']}</h1>
                                <p>${data[i]['program_title']}</p>
                            </a>
                        </div>
                    </div>`
                }

                // $("#display_services").remove(html);
                
                // $("#display_services").append(html);

                document.getElementById('display_services').innerHTML=html;

               

            },
            error: function(response) {
                //console.log(response);
            },
        });
      }
    });
      
</script>
