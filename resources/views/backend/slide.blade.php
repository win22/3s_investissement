@extends('backend.admin_layout')
@section('contenu')
        <div class="container">
            <ul class="slider">
                @foreach($images as $image)
                <li><img src="{{ URL::to($image['image']) }}"
                         style=" height: 40px; width: 40px; border-radius: 15px;"</li>
                @endforeach
            </ul>
        </div>
@endsection