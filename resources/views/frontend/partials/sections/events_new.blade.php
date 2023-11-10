<style>
.dates-calendardate {
  font-family: "PT Sans",'Helvetica Neue',Arial,Helvetica,sans-serif;
  background: #002147;
  color: #fff;
  float: left;
  line-height: 1.3; 
  padding: .7em .5em;
  text-align: center;
  text-transform: uppercase;
  width: 3em;
  top: 5px;
  position: absolute;
}
.event-title{
  max-height: 40px;
    min-height: 40px;
    overflow: hidden;
    font-weight: 700;
    color: #275D38;
}
.event-title:hover{
    color: #047C3B;
}
</style>
@foreach ($events as $key => $item)
  
<div class="d-flex justify-content-start align-items-center {{ $key==0 ? 'mt-3' : 'mt-4' }}" style="position:relative;">
  <div class="col-3">
      <div class="dates-calendardate date-calendardate-no-end">
        <span class="date-calendardate date-calendardate-start"> 
          <span class="date-calendardate-day fs-7">{{ date('d', strtotime($item->date)) }}</span>
          <span class="date-calendardate-month fs-7">{{ date('M', strtotime($item->date)) }}</span>
        </span>
      </div>

  </div>
  <div class="col-9">
    <a href="{{ route('events.details', $item->id) }}" ><h2 class="fs-6 event-title">{{ Str::limit( $item->title, 40) }}</h2></a>
    {{-- <h2 class="fs-6 event-title">{{ Str::limit( $item->title, 40) }}</h2> --}}
    <p class="mb-0 fs-7">{{ date('d M Y', strtotime($item->date)) }}</p>
  </div>
</div>
@endforeach

{{-- <div class="d-flex justify-content-start align-items-center mt-3" style="position:relative;">
  <div class="col-lg-3">
    
    <div class="dates-calendardate date-calendardate-no-end">
      <span class="date-calendardate date-calendardate-start"> 
        <span class="date-calendardate-day">15</span>
        <span class="date-calendardate-month">Feb</span>
      </span>
    </div>
  </div>
  <div class="col-lg-9">
    <h2 class="fs-5">Queer connections - old 'stuff', new stories?</h2>
    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
  </div>
</div>
<div class="d-flex justify-content-start align-items-center mt-3" style="position:relative;">
  <div class="col-lg-3">
    
    <div class="dates-calendardate date-calendardate-no-end">
      <span class="date-calendardate date-calendardate-start"> 
        <span class="date-calendardate-day">23</span>
        <span class="date-calendardate-month">Feb</span>
      </span>
    </div>
  </div>
  <div class="col-lg-9">
    <h2 class="fs-5">Lorem ipsum dolor sit amet consectetur</h2>
    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
  </div>
</div>
</div> --}}