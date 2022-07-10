<div>
    <input placeholder="{{ config('appplaceholder.NAME') }}" type="text" value="{{ old('name') }}" name="name"
        class="@error('name') is-invalid @enderror">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.ADDRESS') }}" type="text" value="{{ old('address') }}"
        name="address" class="@error('address') is-invalid @enderror">
    @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.WEBSITE') }}" type="text" value="{{ old('website') }}"
        name="website" class="@error('website') is-invalid @enderror">
    @error('website')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.EMAIL') }}" type="text" value="{{ old('email') }}"
        name="email" class="@error('email') is-invalid @enderror">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.LOGO') }}" type="file" value="{{ old('logo') }}"
        name="logo" class="@error('logo') is-invalid @enderror" class="@error('name') is-invalid @enderror">
    @error('logo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <button>Submit</button>
</div>
