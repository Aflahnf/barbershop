@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
 <!--            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Auth::user())
                        <div class="alert alert-success" role="alert">
                            {{  __('Welcome ') }} {{ Auth::user()->name }}
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            {{  __('You are not logged in!') }}
                        </div>
                    @endif
                </div>
            </div> -->

            <div style="float:left">
                <img src="https://s3-alpha-sig.figma.com/img/ba21/fdb6/d6a9c47857bea99422ecb0b82cca64d2?Expires=1721606400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=hh82nQuxqklLEUOFTj-I~y1ForPgquNF31il9QUWBqKKUQG8NhGre5kBeykIUs7YiOw-0ah6CFF5VRJs5D~gS4JVlKZio4yPsqe3E0qp6ee3TJw8~t4mgCxz3tK9YN6ZUvDPG4ktq7rsicPO8T8BU9lWfCrNY6dQwMzWE8w8Ezo6aggDQqzoFvVzqAIkfXDLaPanQd~bEv8Nd1Sa6wV2-c5JsJ9AkBJ0t5ijVoslgrEXTxiqc8yk5oGox87Fs1DelcM4zXAaPE21ZRLb8W2niuSQ7L5TOqOZFElvV7VHPZQ07k2B50wGkQSEAUlczUsh0QAbC6uZTXjDeUL0R3tlVg__" height="500" style="object-position: -400px 10%;">
            </div>
            <div style="position:relative;right:400px;top: 200px;font-size: xxx-large;font-family: sans-serif;">
                <p style="margin-bottom: 0rem !important;">Discover Your Best Hairstyle</p>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </div>               
        </div>
    </div>
</div>
@endsection
