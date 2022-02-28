@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Messages</h2>

                </div>
                @if(auth()->check())
                <form action="{{route('message.store')}}" method="post">
                    @csrf


                <div class="input-group">
                    <input
                        type="text"
                        name="message"
                        class="form-control"
                        placeholder="Type your message here..."
                    >


                    <button type="submit"
                        class="btn btn-primary"

                    >
                        Send
                    </button>
                </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
