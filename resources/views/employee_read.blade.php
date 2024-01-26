@extends('welcome')

@section('content')

<div>

    <label for="image">Photo</label>
<img src="/images/{{ $employee3->photo }}" alt="" class="w-82" id="image">
</div>

<div>
    <label for="name">Name</label>
    <p class="text-xl" id="name">{{ $employee3->name }}</p>
</div>

<div>
    <label for="job">Job</label>
    <p class="text-xl" id="job">{{ $employee3->job }}</p>
</div>

<div>
    <label for="employed">Hire started date</label>
    <p class="text-xl" id="employed">{{ $employee3->employed }}</p>
</div>


@endsection