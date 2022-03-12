<div  class="col-6">

    @foreach($messages as $message)

        <div class="card w-75  {{$message->sender_id == auth()->id() ? 'float-end bg-default' : ' '}}    ">
            <div class="card-body ">

                <p class="card-text ">{{$message->text}}
                    <span
                        class="badge bg-secondary float-end"
                        style="font-size: 10px">{{ $message->created_at->diffForHumans() }} </span>
                    <span
                        class="badge  {{$message->sender_id == auth()->id() ? $message->isDeliver() ? 'bg-success' : 'bg-secondary':''}} float-end"
                        style="font-size: 10px">{{$message->isDeliver() ? 'seen' :'sent'}}</span>
                </p>

            </div>


        </div>

    @endforeach
{{--    @if($selectedUser)--}}
        <div class="row float-end">
            <br>
            <hr>
            <form action="" wire:submit.prevent="sendMessage">
                <div class="col-12">
                    <input wire:model.lazy="text" class="form-control" list="datalistOptions" id="exampleDataList"
                           placeholder="Type message...">
                </div>

                <div class="col-1 float-end">
                    <button type="submit" class="btn btn-primary">send</button>
                </div>
                @error('text') <span class="alert-danger">{{ $message }}</span> @enderror
            </form>
        </div>
{{--    @endif--}}
</div>

