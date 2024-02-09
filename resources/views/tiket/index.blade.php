@extends('layouts.app')
@section('content')
<!-- User DataTable -->
<div class="card">
    <div class="card-header">Query</div>
    <div class="card-body">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush