@extends('niveaux.layout')

@section('content')
    <div class="row" style="margin-top: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestion des Niveaux</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('niveaux.create') }}"> Create New Level</a>
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
            <th>Libelle</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($niveaux as $niveau)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $niveau->libelle }}</td>
                <td>
                    <form action="{{ route('niveaux.destroy',$niveau->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('niveaux.show',$niveau->id) }}">Show</a>



                        <a class="btn btn-primary" href="{{ route('niveaux.edit',$niveau->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $niveaux->links() !!}

@endsection
