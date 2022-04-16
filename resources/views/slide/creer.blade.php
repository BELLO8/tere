@extends('layouts.backLayout.designadmin')


@section('content')

@php($Module='Parametre')
@php($titre='Liste des slides')
@php($soustitre='Ajouter un slide')


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
                </div>
                {!! Form::open(array('route' => 'creerslides','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Titre:</label>
                            {!! Form::text('titre_slide', null, array('placeholder' => 'Titre service','class' => 'form-control')) !!}

                            <span class="form-text text-muted">  </span>
                        </div>
                        <div class="col-lg-6">
                            <label>Libelle du bouton:</label>
                            {!! Form::text('libelle_bouton_slide', null, array('placeholder' => 'Libelle du bouton','class' => 'form-control')) !!}

                            <span class="form-text text-muted">  </span>
                        </div>
                        <div class="col-lg-6">
                            <label>Lien du bouton:</label>
                            {!! Form::text('lien_bouton_slide', null, array('placeholder' => 'lien du bouton','class' => 'form-control')) !!}

                            <span class="form-text text-muted">  </span>
                        </div>
                        <div class="col-lg-6">
                            <label>Commentaire:</label>
                            <textarea class="summernote" id="description_slide" name="description_slide" rows="6"></textarea>

                        </div>
                        <div class="col-lg-12">
                            <label>Media:</label>
                            <input type="file" class="form-control" placeholder="ajouter un  fichier" name="slide"  />


                            <span class="form-text text-muted">  </span>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="btn btn-sm btn-secondary" href="{{ route('slides') }}"> Retour</a>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Valider</button>
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
{!! Form::close() !!}


@endsection
