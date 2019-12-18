@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">modele</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des vehicules</a>
                </li>
                <li class="active">
                    Modèle
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')
    @if($modeles->count() > 0)

        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer un modèle</h4>
                    <div class="custom-modal-text text-left">
                        <form method="post" action="/modele">
                            @include('modele.form', ['btnSubmit' => 'Enregistrer'])
                        </form>
                    </div>
                </div>

                <h4 class="text-dark header-title m-t-0">Liste des modeles de véhicules</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modeles as $modele)
                            <tr>
                                <td>
                                    {{ $modele->name }}
                                </td>
                                <td>
                                    <a href="#custom-edit-modal-{{ $modele->id }}" class="table-action-btn" data-animation="fadein"
                                        data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                         <i class="md md-edit"></i>
                                     </a>
                                     <div id="custom-edit-modal-{{ $modele->id }}" class="modal-demo">
                                         <button type="button" class="close" onclick="Custombox.close();">
                                             <span>&times;</span><span class="sr-only">Fermer</span>
                                         </button>
                                         <h4 class="custom-modal-title">Enregistrer un véhicule</h4>
                                         <div class="custom-modal-text text-left">
                                             <form method="POST" action="/edit/{{ $modele->id }}/modele">
                                                 {{ method_field('PATCH') }}
                                                 @include('modele.form', ['btnSubmit' => 'Modifier', 'modele' => $modele])
                                             </form>
                                         </div>
                                     </div>
                                    <!--<a href="#" class="table-action-btn"><i class="md md-close"></i></a>-->
                                    <a href="#custom-delete-modal-{{ $modele->id }}" class="table-action-btn" data-animation="fadein"
                                        data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                         <i class="md md-close"></i>
                                     </a>
                                     <div id="custom-delete-modal-{{ $modele->id }}" class="modal-demo">
                                         <button type="button" class="close" onclick="Custombox.close();">
                                             <span>&times;</span><span class="sr-only">Fermer</span>
                                         </button>
                                         <h4 class="custom-modal-title">Supprimer un modele</h4>
                                         <div class="custom-modal-text text-left">
                                             <div class="modal-body">
                                                 Voulez-vous supprimer la modele {{ $modele->name }} ?
                                             </div>
                                             <div class="modal-footer">
                                                 <form action="/modele/{{ $modele->id }}/delete" method="POST">
                                                     {{ csrf_field() }}
                                                     {{ method_field('DELETE') }}
                                                     <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</button>
                                                     <button type="submit" class="btn btn-primary">Supprimer</button>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>
                               
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    @else
        <div class="text-center text-muted">
            <strong>Aucun modèle de véhicule enregistré</strong><br>

            <a href="#custom-modal" class="btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
               data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer un modèle</h4>
                <div class="custom-modal-text text-left">
                    <form method="post" action="/modele">
                        @include('modele.form', ['btnSubmit' => 'Enregistrer'])
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection