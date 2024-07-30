@extends('master')
@section('title', "liste des étudiants")

@section('content')*
<div class="container">
    <form action="{{ route('etudiants.index') }}" method="GET">
        <div class="search-bar">
            <div>
                <input type="text" id="search" name="search" placeholder="Rechercher par nom, prénom ou adresse">
            </div>
            <div>
                <select id="filiere" name="filiere">
                    <option value="">Toutes les filières</option>
                    @foreach ($filieres as $filiere)
                    <option value="{{ $filiere->id }}" {{ request('filiere') == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->nom }}
                               </option> @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </form>

    <a href="{{ route('etudiants.create') }}" class="btn btn-primary mb-3">Nouveau Étudiant</a>
    <table border="03">
        <thead>
            <tr>
                <th>ID</th>
                <th>Filière</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom </th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th>Date de naissance</th>
                <th>Numéro</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->filiere->code }} - {{ $etudiant->filiere->nom }}</td>
                <td>{{ $etudiant->matricule }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->sexe }}</td>
                <td>{{ $etudiant->adresse }}</td>
                <td>{{ $etudiant->date_naissance }}</td>
                <td>{{ $etudiant->numero }}</td>
                <td class="actions">
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-success">Modifier</a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $etudiants->links() }}
</div>
@endsection

