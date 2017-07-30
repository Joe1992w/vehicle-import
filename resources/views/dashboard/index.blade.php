@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($stats as $name => $stat)
            <div class="col-sm-4 col-md-3">
                <a href="{{ $stat['url'] }}" class="stat">
                    <div class="icon">
                        <i class="fa fa-{{ $stat['icon'] }}" aria-hidden="true"></i>
                        {{ $name }}
                    </div>
                    {{ $stat['value'] }}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
