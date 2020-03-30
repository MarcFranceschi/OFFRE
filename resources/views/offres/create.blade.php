@extends('layouts.app', ['activePage' => 'Création d\'une offre', 'titlePage' => __('Création d\'offres')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('offres.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Ajouter une offre') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('offres.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Titre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" id="input-titre" type="text" placeholder="{{ __('Titre') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="titre-error" class="error text-danger" for="input-titre">{{ $errors->first('titre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Description') }}" value="" required />
                      @if ($errors->has('email'))
                        <span id="description-error" class="error text-danger" for="input-descr">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-niveau">{{ __(' Niveau') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('niveau') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('niveau') ? ' is-invalid' : '' }}" input type="text" name="niveau" id="input-niveau" placeholder="{{ __('Niveau') }}" />
                      @if ($errors->has('niveau'))
                        <span id="niveau-error" class="error text-danger" for="input-niveau">{{ $errors->first('niveau') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-pdf">{{ __('PDF') }}</label>
                  <div class="col-sm-7">
                  @csrf
                    <div class="form-group{{ $errors->has('pdf') ? ' has-danger' : '' }}">
                    <!-- Upload  -->
                    <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"  type="file" accept="application/pdf" name="fileUpload" id="fileUpload"  value="{{ old('fileUpload') }}">
        <label for="fileUpload" id="file-drag">
            <div id="start" >
               <!-- <div>Select a file or drag here</div>-->
                <span id="fileUpload" class="btn btn-primary">{{ __('Séléctionner un fichier') }}</span>
                <br>
                @if ($errors->has('niveau'))
                <span id="niveau-error" class="error text-danger">{{ $errors->first('fileUpload') }}</span>
                @endif
            </div>
          </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Ajouter l\'offre') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
