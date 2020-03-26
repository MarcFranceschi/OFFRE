@extends('layouts.app', ['activePage' => 'offre', 'titlePage' => __('Créer une offre')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Formulaire de créations d'offre</h4>
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
                <form action="{{route('store')}}" method=post>
                @csrf
                  <tr>
                    <td>
                    <input type="text" name="Titre" placeholder="Titre">
                    </td>
                    <td>
                    <input type="text" name="Description" placeholder="Description">
                    </td>
                    <td>
                    <input type="text" name="Niveau" placeholder="Niveau">
                    </td>
                    <td>
                    PDF
                    </td>
                    </td>
                  </tr>
             </tbody>
              </table>
        <input type="submit" value="Ajouter l'offre">
    </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection