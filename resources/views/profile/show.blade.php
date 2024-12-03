@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

{{-- Tampilkan data profile --}}
<div>
    <h2>Profile {{ $user->name }}</h2>
    {{-- Tampilkan detail profile --}}
    <div>
        {{-- Data profile --}}
    </div>
    
    {{-- Tampilkan skills --}}
    <div>
        <h3>Skills</h3>
        @foreach($skill as $s)
            <div>{{ $s->nama_skill }}</div>
        @endforeach
    </div>
</div> 