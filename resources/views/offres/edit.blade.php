@extends('layouts.app', ['activePage' => 'Modification d'une offre', 'titlePage' => __('Modification d\'une offre')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form method="post" action="{{ route('offres.update', $offre) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Édition d\'une offre') }}</h4>
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
                      <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" id="input-titre" type="text" placeholder="{{ __('Titre') }}" value="{{ old('titre', $offre->titre) }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-descr" type="texte" placeholder="{{ __('Email') }}" value="{{ old('email', $offre->description) }}" required />
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
                    <div class="form-group">
                      <input class="form-control" name="pdf" id="pdf" type="document" placeholder="{{ __('pdf') }}" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection