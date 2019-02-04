@extends('etudiants.layout')

@section('content')
    <div class="row" style="margin-top: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestion des etudiants</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('etudiants.create') }}"> Create New Student</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Genre</th>
            <th>Telephone</th>
            <th>email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->genre }}</td>
                <td>{{ $etudiant->telephone }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>
                    <form action="{{ route('etudiants.destroy',$etudiant->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('etudiants.show',$etudiant->id) }}">Show</a>



                        <a class="btn btn-primary" href="{{ route('etudiants.edit',$etudiant->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $etudiants->links() !!}

@endsection
