<x-admin-layout>
    <div class="container" style="background-color:white;">
    <form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="form-group mb-3">
        <label for="">{{ __('home.name') }}:</label> {{$role->name}} <label ></label>
<!--         <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror"> -->
        @error('name')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="">Abilities:</label>
        <div class="row">
            @foreach(config('abilities') as $key => $label)
             <div class="col-3">
            <div class="mb-1">
                <label for="">
                    <input type="checkbox" name="abilities[]" value="{{ $key }}" @if(in_array($key, $role->abilities)) checked @endif>
                    {{ $label }}
                </label>
            </div>
             </div>

            @endforeach
        </div>
        @error('abilities')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ __('home.update') }}</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('home.cancel') }} </a>
    </div>
</form>
    </div>
</x-admin-layout>
