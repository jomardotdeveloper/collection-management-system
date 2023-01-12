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
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>Full Name</th>
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
@push('scripts')
<script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.0.0') }}"></script>
@endpush