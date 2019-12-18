@extends('layouts.app')

@section('page-title')
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">Marque</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">Gestion des vehicules</a>
				</li>
				<li class="active">
					Véhicule
				</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')

	<hr>
	@include('layouts.errors')
	@if($vehicules->count() > 0)
		<div class="col-md-8 col-md-offset-2">
			<div class="card-box">
				<a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
				   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

				<div id="custom-modal" class="modal-demo">
					<button type="button" class="close" onclick="Custombox.close();">
						<span>&times;</span><span class="sr-only">Fermer</span>
					</button>
					<h4 class="custom-modal-title">Enregistrer un véhicule</h4>
					<div class="custom-modal-text text-left">
						<form method="POST" action="/vehicule">
							@include('vehicule.form', ['btnSubmit' => 'Enregistrer', 'vehicule' => new \App\Vehicule()])
						</form>
					</div>
				</div>



				<h4 class="text-dark header-title m-t-0">Liste des véhicules</h4>
				<hr>

				<div class="table-responsive">
					<table class="table table-actions-bar m-b-0">
						<thead>
						<tr>
							<th>#</th>
							<th>Modèle</th>
							<th>Immatriculation</th>
							<th>Catégorie</th>
							<th style="min-width: 80px;">Manage</th>
						</tr>
						</thead>
						<tbody>
							@foreach($vehicules as $vehicule)
								<tr>
									<td>{{ $vehicule->id }}</td>
									<td>{{ $vehicule->modele_id }}</td>   
									<td>{{ $vehicule->immatriculation }}</td>
									<td>{{ $vehicule->category_id }}</td>
									<td>
										<a href="#custom-edit-modal-{{ $vehicule->id }}" class="table-action-btn" data-animation="fadein"
										   data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
											<i class="md md-edit"></i>
										</a>
										<div id="custom-edit-modal-{{ $vehicule->id }}" class="modal-demo">
											<button type="button" class="close" onclick="Custombox.close();">
												<span>&times;</span><span class="sr-only">Fermer</span>
											</button>
											<h4 class="custom-modal-title">Enregistrer un véhicule</h4>
											<div class="custom-modal-text text-left">
												<form method="POST" action="/edit/{{ $vehicule->id }}/vehicule">
													{{ method_field('PATCH') }}
													@include('vehicule.form', ['btnSubmit' => 'Modifier', 'vehicule' => $vehicule])
												</form>
											</div>
										</div>
										<a href="#custom-delete-modal-{{ $vehicule->id }}" class="table-action-btn" data-animation="fadein"
										   data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
											<i class="md md-close"></i>
										</a>
										<div id="custom-delete-modal-{{ $vehicule->id }}" class="modal-demo">
											<button type="button" class="close" onclick="Custombox.close();">
												<span>&times;</span><span class="sr-only">Fermer</span>
											</button>
											<h4 class="custom-modal-title">Supprimer un véhicule</h4>
											<div class="custom-modal-text text-left">
												<div class="modal-body">
													Voulez-vous supprimer le véhicule {{ $vehicule->immatriculation }} ?
												</div>
												<div class="modal-footer">
													<form action="/vehicule/{{ $vehicule->id }}/delete" method="POST">
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
			<strong>Aucun véhicule enregistré</strong><br>

			<a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
			   data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
			<div id="custom-modal" class="modal-demo">
				<button type="button" class="close" onclick="Custombox.close();">
					<span>&times;</span><span class="sr-only">Fermer</span>
				</button>
				<h4 class="custom-modal-title">Enregistrer un véhicule</h4>
				<div class="custom-modal-text text-left">
					<form method="POST" action="/vehicule">
						@include('vehicule.form', ['btnSubmit' => 'Enregistrer', 'vehicule' => new \App\Vehicule()])
					</form>
				</div>
			</div>
		</div>
	@endif
@endsection