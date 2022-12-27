@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Clients</h4>
        </div>
    </div>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Create</a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Birthdate</th>
                        <th>Civil Status</th>
                        <th>Contact #</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>
                                <a href="{{ route('clients.show', ["client" => $client]) }}">
                                    {{  $client->full_name }}
                                </a>
                            </td>
                            <td>{{  $client->email }}</td>
                            <td>{{  $client->profile->birthdate }}</td>
                            <td>{{  $client->profile->civil_status }}</td>
                            <td>{{  $client->contact_no }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection