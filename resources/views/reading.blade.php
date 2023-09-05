@include('header');
<h3 class="text-center">Read Your Note</h3>
<br><br>
<hr style="color:blue">
<div class="container">
    <a name="" id="" class="btn btn-primary" href="{{route('show')}}" role="button"><i class="fa-solid fa-backward"></i> Back</a>
    <br><br>
    <ul class="text-center">
       <li><h2>{{$reading->title}}</h2></li>
       <br><br><br>
       <li> <p>{!!$reading->desc!!}</p></li>
       <br><br><br>
       <li><img src="{{asset('images/'.$reading->image)}}" alt="Image" width="100%" height="100%"></li>
    </ul>
</div>