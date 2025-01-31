@extends('layouts.backLayout.designadmin')


@section('content')

@php($Module='Parametre')
@php($titre='Liste des articles')
@php($soustitre='Modifier un article')


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
                                            @can('active-desactive-article')
                                                 <?php if($article->flag_article == 1){ ?>

                                                    <label class="label label-lg label-warning label-inline"><a href="{{ route('desactivearticle',\App\Helpers\Crypt::UrlCrypt($article->id_article )) }}"> Desactiver </a></label>

                                                <?php }else{ ?>

                                                    <label class="label label-lg label-success label-inline"><a href="{{ route('activearticle',\App\Helpers\Crypt::UrlCrypt($article->id_article )) }}"> Active </a></label>

                                                <?php }  ?>
                                            @endcan
                                            <!--end::Button-->
                                        </div>
                </div>
                <form  action="{{ route('modifierarticle',\App\Helpers\Crypt::UrlCrypt($id))}}" method="post"  enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label></label>
                            <select
                                class="form-control "
                                name="id_categ_article" id="kt_select2_2"/>

                            <?php echo $categoriearticle; ?>

                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Titre:</label>
                            <input class="form-control" type="text" name="titre_article" value="{{$article->titre_article}}" >
                            <span class="form-text text-muted">  </span>
                        </div>
                        <div class="col-lg-6">
                            <label>Sous titre:</label>
                            <input class="form-control" type="text" name="sous_titre" value="{{$article->sous_titre}}" >
                            <span class="form-text text-muted">  </span>
                        </div>
                        <div class="col-lg-6">
                            <label>Lien article:</label>
                            <input class="form-control" type="text" name="lien_article" value="{{$article->lien_article}}" >
                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">
                            <label>Video :</label>
                            {!! Form::text('lien_video', $article->lien_video, array('placeholder' => 'Lien de la video','class' => 'form-control')) !!}

                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">
                            <label>Image :</label>
                            <input type="file" class="form-control" placeholder="ajouter un  fichier" name="image_article"  />


                            <span class="form-text text-muted">  </span>
                        </div>

                        <div class="col-lg-6">
                            <label>Description :</label>
                            <textarea class="summernote" id="description_article" name="description_article" rows="6">{{$article->description_article}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label>Description detaillé:</label>
                            <textarea class="summernote" id="description_article" name="description_detaille" rows="6">{{$article->description_detaille}}</textarea>

                        </div>

                               <div class="col-lg-6">
                                    @if(!empty($article->image_article))
                                    <img src="{{ asset('/frontend/imagearticle/'. $article->image_article)}}" alt="">
                                    @endif
                               </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="btn btn-sm btn-secondary" href="{{ route('article') }}"> Retour</a>
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
