@extends('Layout.main')

@section('content')

<div class="row">
   <div class="col-sm-11">Titolo</div>
   <div class="col-sm-1">Anno</div>
 
   <div class="col-sm-12">
       <ul class="list-inline">    
           @foreach($topics as $topic)
               <li class="list-inline-item">{{$topic}}</li>
           @endforeach
       </ul>
       <!--sistemare lo spazio che lascia dopo le liste-->
   </div>
   
   <div class="col-sm-12">Venue</div>
   
   <div class="col-sm-11">
       <ul class="list-inline">
           @foreach($authors as $author)
               <li class="list-inline-item">{{$author}}</li>
           @endforeach
       </ul>
       <!--sistemare lo spazio che lascia dopo le liste-->
   </div>    
   <div class="col-sm-1">Mod</div>
</div>

@endsection