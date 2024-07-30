@extends('master')
@section('title', "Création d'un étudiant")


@section('content')
   

    <div class="container mt-5">
        <h1>Création d'un étudiant</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter Étudiant</h4>
                <form action="{{ route('etudiants.store') }}" method="POST">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="filiere">Filière</label>
                        <select name="filiere" id="filiere" class="form-control">
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}" {{ $filiere->id == old('filiere') ? 'selected' : '' }}>
                                    {{ $filiere->code }} - {{ $filiere->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input id="nom" name="nom" type="text" class="form-control" required value="{{ old('nom') }}">
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input id="prenom" name="prenom" type="text" class="form-control" required value="{{ old('prenom') }}">
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <div class="form-check">
                            <input type="radio" name="sexe" value="M" class="form-check-input" id="sexeM" required {{ old('sexe') == 'M' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sexeM">Masculin</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="sexe" value="F" class="form-check-input" id="sexeF" required {{ old('sexe') == 'F' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sexeF">Féminin</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" name="adresse" type="text" class="form-control" required value="{{ old('adresse') }}">
                    </div>

                    <div class="form-group">
                        <label for="date_naissance">Date de naissance</label>
                        <input id="date_naissance" name="date_naissance" type="date" class="form-control" required value="{{ old('date_naissance') }}">
                    </div>

                    <div class="form-group">
                        <label for="numero">Numéro</label>
                        <input id="numero" name="numero" type="text" class="form-control" required value="{{ old('numero') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>


   



