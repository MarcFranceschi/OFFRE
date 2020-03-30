@extends('layouts.app', ['activePage' => 'Liste des offres', 'titlePage' => __('Liste des offres')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Toutes les offres</h4>
          </div>
          <div class="card-body">
          @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <div class="col-12 text-right">
                    <a href="{{ route('offres.create') }}" class="btn btn-sm btn-primary">{{ __('Ajouter une offre') }}</a>
                  </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                <th>
                {{ __('Titre') }}
                  </th>
                  <th>
                  {{ __('Description') }}
                  </th>
                  <th>
                  {{ __('Niveau') }}
                  </th>
                  <th>
                  {{ __('PDF') }}
                  </th>
                  <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                </thead>
                <tbody>
                @foreach($offre as $offres)
                  <tr>
                    <td>
                    {{ $offres->titre }}
                    </td>
                    <td>
                    {{ $offres->description }}
                    </td>
                    <td>
                    {{ $offres->niveau }}
                    </td>
                    <td>
                    {{ $offres->pdf }}
                    </td>
                    <td class="td-actions text-right">
                              <form action="{{ route('offres.destroy', $offres) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('offres.edit', $offres) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this offre?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            
                          </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection