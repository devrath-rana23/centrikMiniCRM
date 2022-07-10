<div>
    <input placeholder="{{ config('appplaceholder.FIRST_NAME') }}" type="text" value="{{ old('first_name') }}"
        name="first_name" class="@error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.LAST_NAME') }}" type="text" value="{{ old('last_name') }}"
        name="last_name" class="@error('last_name') is-invalid @enderror">
    @error('last_name')
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
    <input placeholder="{{ config('appplaceholder.PHONE') }}" type="number" maxlength="10" minlength="10"
        value="{{ old('phone') }}" name="phone" class="@error('phone') is-invalid @enderror">
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input placeholder="{{ config('appplaceholder.PASSWORD') }}" type="password" maxlength="10" minlength="10"
        value="{{ old('password') }}" name="password" class="@error('password') is-invalid @enderror">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <select name="company_id">
        <option value="">Select Company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
    <input placeholder="{{ config('appplaceholder.PASSWORD') }}" type="password" maxlength="10" minlength="10"
        value="{{ old('password') }}" name="password" class="@error('password') is-invalid @enderror">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <button>Submit</button>
</div>
