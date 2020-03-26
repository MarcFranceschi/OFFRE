@extends('layouts.app', ['activePage' => 'offre', 'titlePage' => __('Liste des offres')])
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
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <div class="col-12 text-right">
                    <a href="{{ route('create-offre') }}" class="btn btn-sm btn-primary">{{ __('Ajouter une offre') }}</a>
                  </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                <th>
                    Titre
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Niveau
                  </th>
                  <th>
                    PDF
                  </th>
                </thead>
                <tbody>
                @foreach($offreslist as $offres)
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
                              <form action="{{ route('delete-offre', $offres) }}" method="put">
                                  @csrf
                                  @method('delete')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('edit-offre', $offres) }}" data-original-title="" title="">
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