@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">PROGRAMMING & TOOLS</label>
            <input type="text" class="form-control skill" name="_language" id="judul" aria-describedby="helpId"
                placeholder="programming & tools" value="{{ get_meta_value('_language') }}">
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">WORKFLOW</label>
            <textarea class="form-control summernote" rows="5" name="_workflow">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
