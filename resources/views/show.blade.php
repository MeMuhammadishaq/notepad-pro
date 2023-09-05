@include('header')
   {{-- include header --}}
  {{-- show flash msg start --}}
  @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session()->get('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
<h1 class="text-center">Welcome To NotePad</h1>
.<div class="container">
   <div> <a name="" id="" class="btn btn-primary" href="{{route('view')}}" role="button"><i class="fa-solid fa-plus"></i></a> </div>
   <br>
    
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">S/no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th>Image</th>
                    <th class="text-center" colspan="3">Action</th>
                </tr>
            </thead> 
            @php
                $sno =0;
            @endphp
            
            @if(count($read) !== 0)
            @foreach ($read as $item )
            @php
                $sno = $sno +1;
            @endphp
            
            <tbody>
                <tr class="">
                    <td>{{$sno}}</td>
                    <td>{{$item->title}}</td>
                    <td><p class="text-truncate">{!!$item->desc!!}</p></td>
                    <td> 
                        <a target="_blank" href="{{ asset('images/' . $item->image) }}" width="100%"height="100%">
                        <img src="{{asset('images/'.$item->image)}}" alt="image" width="50px" height="50px">
                        </a>
                    </td>
                    <td><a class="btn btn-warning" href="{{url('/reading',['id'=>$item->id])}}">View</a> </td>
                    <td><a class="btn btn-primary" href="{{url('/edit',['id'=>$item->id])}}">Edit</a> </td>
                    <td><a class="btn btn-danger" href="{{url('/delete',['id'=>$item->id])}}">Delete</a> </td>
                </tr>
            </tbody>

            @endforeach
            @else
                         <td colspan="5"><h3 class="text-center">recourd not found</h3></td>
            @endif
        </table>
    </div>
    <div class="row">
       {{$read->links()}}
    </div>
    
</div>



