<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('Bienvenue') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('les-offres') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Tableau de bord') }}</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#GestionUtilisateur" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Gestion utilisateurs') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="GestionUtilisateur">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal">{{ __('Mon profil') }} </span>
              </a>
            </li>
            @can('user-edit')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> GU </span>
                <span class="sidebar-normal"> {{ __('Gérer les utilisateurs') }} </span>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @can('offre-list')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#GestionOffre" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Gestion offres') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="GestionOffre">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('front.index') }}">
                <i class="material-icons">content_paste</i>
                <p>{{ __('Consulter les offres') }}</p>
              </a>
            </li>
          </ul>
        </div>
        @endcan
        @can('offre-create')
        <div class="collapse show" id="GestionOffre">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('offres.index') }}">
                <i class="material-icons">content_paste</i>
                <p>{{ __('Gérer les offres') }}</p>
              </a>
            </li>
          </ul>
        </div>
        @endcan
      </li>
      @can('role-list')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#GestionRole" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Gestion rôles') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="GestionRpme">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="material-icons">content_paste</i>
                <p>{{ __('Gérer les rôles') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endcan
    </ul>
  </div>
</div>