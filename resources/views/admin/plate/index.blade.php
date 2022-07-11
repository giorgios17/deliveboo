@extends('layouts.app')
@section('content')
    <div id="plate_index" class="row justify-content-center pb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            LA TUA LISTA PIATTI
        </h1>
        @if ($plates->count() > 0)
            @foreach ($plates as $plate)
                <div class="card m-3 shadow" style="width: 18rem;">
                    <div class="wrapper_img p-3">
                        <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top h-100 w-100"
                            alt="{{ $plate->name }}">
                    </div>
                    <div class="card-body d-flex flex-wrap">
                        <h4 class="card-title col-12">{{ $plate->name }}</h4>
                        <p class="card-text mb-2 col-12">{{ $plate->description }}</p>
                        <div class="col-12">
                            <p class="card-text d-inline-block mb-2 mr-2">Prezzo: {{ $plate->price }}€</p>
                            <p class="card-text d-inline-block">
                                @if ($plate->visible)
                                    <p class="badge badge-success text-white mb-3">Visibile</p>
                                @else
                                    <p class="badge badge-danger text-white mb-3">Non Visibile</p>
                                @endif
                            </p>
                        </div>
                        <div class="align-self-end col-12">
                            <a href="{{ route('admin.plate.edit', $plate->id) }}"
                                class="btn btn-primary btn_modify mr-2">Modifica</a>
                            <form action="{{ route('admin.plate.destroy', $plate->id) }}" method="post"
                                class=" d-inline-block delete_form">
                                @csrf
                                @method('DELETE')
                                <button type='submit' type="submit" value="" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h4>Non hai ancora aggiunto nessun piatto.</h4>
        @endif
    </div>
@endsection
