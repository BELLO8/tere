@extends('layouts.backLayout.designadmin')


@section('content')

@php($Module='Parametre')
@php($titre='Liste des logos')
@php($soustitre='Modifier un logo')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">{{$soustitre}}</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a class="text-muted">{{$Module}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">{{$titre}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">{{$soustitre}}</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->

        </div>
    </div>

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">


            @if ($errors->any())

            <div class="alert alert-custom alert-danger fade show" role="alert">
                <div class="alert-text">
                    <strong>Echec :</strong> Veuillez renseigner les informations du formulaire !</div>
                <div class="alert-close">
                    <button type="button" class="btn-sx close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif

            <!--end::Notice-->
            <!--begin::Card-->
            <div class="card card-custom" style="width: 100%">
                <div class="card-header">
                    <div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
                        <h3 class="card-label">{{$soustitre}}</h3>
                    </div>
                    	<div class="card-toolbar">
                                            <!--begin::Dropdown-->
                                            <div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-sm btn-light-primary font-weight-bolder dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="la la-download"></i>Exporter
                                                </button>
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="nav flex-column nav-hover">
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon la la-print"></i>
                                                                <span class="nav-text">Imprimer</span>
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon la la-file-text-o"></i>
                                                                <span class="nav-text">CSV</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon la la-file-pdf-o"></i>
                                                                <span class="nav-text">PDF</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!--end::Dropdown Menu-->
                                            </div>
                                            <!--end::Dropdown-->
                                            <!--begin::Button-->
                                            @can('active-desactive-logo')

                                                                          <?php if($logo->flag_logo == 1){ ?>

                                                                              <label class="label label-lg label-warning label-inline"><a href="{{ route('desactivelogo',\App\Helpers\Crypt::UrlCrypt($logo->id_logo )) }}"> Desactiver </a></label>

                                                                          <?php }else{ ?>

                                                                              <label class="label label-lg label-success label-inline"><a href="{{ route('activelogo',[\App\Helpers\Crypt::UrlCrypt($logo->id_logo), \App\Helpers\Crypt::UrlCrypt($logo->valeur)]) }}"> Active </a></label>

                                                                          <?php }  ?>


                                                                          @endcan
                                            <!--end::Button-->
                                        </div>
                </div>
                <form  action="{{ route('modifierlogo',\App\Helpers\Crypt::UrlCrypt($id))}}" method="post"  enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Titre:</label>
                            <input class="form-control" type="text" name="titre_logo" value="{{$logo->titre_logo}}" >
                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">
                            <label>Types valeur :</label>
                            <select class="form-control" name="valeur" id="kt_select2_2">
                                <option value="{{ $logo->valeur }}">{{ $logo->valeur }}</option>
                                <option value="LOGO">LOGO</option>
                                <option value="EMAIL">EMAIL</option>
                                <option value="CONTACT">CONTACT</option>
                                <option value="RESEAUX SOCIAUX">RESEAUX SOCIAUX</option>
                                <option value="ESPACE CLIENT">ESPACE CLIENT</option>
                                <option value="OUVRIR COMPTE">OUVRIR COMPTE</option>
                                <option value="NEWSLETTER">NEWSLETTER</option>
                            </select>
                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">
                            <label>Fichier:</label>
                            <input type="file" class="form-control" placeholder="ajouter un  fichier" name="logo_logo"  />


                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">

                            <label>Valeur du mot clé :</label>
                            <textarea class="summernote" id="description_article" name="mot_cle" rows="6">{{  $logo->mot_cle  }}</textarea>

                        </div>

                        <div class="col-lg-12">
                         @if(!empty($logo->logo_logo))

                                                          <img src="{{ asset('/frontend/logo/'. $logo->logo_logo)}}" alt="" >

                                                        @endif
                                                </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="btn btn-sm btn-secondary" href="{{ route('logo') }}"> Retour</a>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
                        </div>
                    </div>
                </div>

                </form>
            </div>


            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>



@endsection
