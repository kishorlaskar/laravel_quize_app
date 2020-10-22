@extends('master')

@section('content')
<div class="container-fluid">
<form method="post" action="{{ route('submitans') }}">
    @csrf
    <div class="row" style="padding-top:30vh; color: white ">
           <div class="col-md-3">
               <div class="col-md-4">
                   <h4>{{ $question->question }}</h4>
                   <input value="a"  name="ans" type="radio"> : (A)<small>{{ $a->a }}</small>
                   <input value="b"  name="ans" type="radio"> : (B) <small>{{ $b->b }}</small>
                   <input value="c"  name="ans" type="radio"> : (C) <small>{{ $c->c }}</small>
                   <input value="d" name="ans" type="radio"> : (D) <small>{{ $d->d }}</small>
                   <input value="{{ $question->ans }}"style="visibility:hidden" name="dbans">
               </div>
               <div class="col-md-5"></div>

           </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
             <button type="submit" style="" class="btn btn-primary">Next</button> </a>
        </div>
        <div class="col-md-7"></div>
    </div>
</form>
</div>
@endsection
