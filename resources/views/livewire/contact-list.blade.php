<div class="col-5">
    <h3 class="card-header">{{ __('contacts') }}</h3>
    <hr>
        <div class="col-12">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach($contacts as $contact)
                <a wire:click="$emit('selectContact',{{$contact}})" class="list-group-item list-group-item-action my-1" id="list-home-list" data-bs-toggle="list"
                   role="tab" aria-controls="list-home">{{$contact->name}}

                </a>

                @endforeach

            </div>
        </div>

</div>
