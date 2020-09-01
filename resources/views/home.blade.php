@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Bienvenido . {{ auth()->user()->name }} </h4>
                    <h4>id . {{ auth()->user()->id }} </h4>

                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>user id</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Contact number</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td> {{ $contact->user_id }} </td>
                                    <td> {{ $contact->fname }} </td>
                                    <td> {{ $contact->lname }} </td>
                                    <td> {{ $contact->email }} </td>
                                    <td> {{ $contact->number }} </td>
                                    <td> <a href=" {{ route('home.delete', ['id' => $contact->id])}}  " class="btn-sm btn-danger">delete</a> </td>
                                    <td> <a href=" {{ route('home.email', ['id' => $contact->id])}}  " class="btn-sm btn-info">email</a> </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Paginacion -->
                    <div class="clearfix"></div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
