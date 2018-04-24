@extends('layouts.master')
@section('title', 'ENTREZO Promotions : Enter Now!')
@section('content')

    <section class="section">
    
        @if (count($errors))

        <article class="message is-danger">
          <div class="message-header">
            <p>We want you to win but you need to do your bit too!</p>
            <!-- <button class="delete" aria-label="delete"></button> -->
          </div>
          <div class="message-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>> {{ $error }}</li>
                @endforeach
             </ul>
          </div>
        </article>

        @endif

        <form method="post" action="/" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="firstname" value="{{ old('firstname') }}" required>
                </div>
                {{ $errors->first('firstname') }}
            </div>
            <div class="field">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="lastname" value="{{ old('lastname') }}" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left">
                    <input class="input" type="email" name="email" value="{{ old('email') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Telephone</label>
                <div class="control">
                    <input class="input" type="tel" name="telephone" value="{{ old('telephone') }}" required>
                </div>
            </div>

            <div class="field">
                <div class="select is-rounded">
                  <select name="gender" required>
                    <option value="">Gender?</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  </select>
                </div>
            </div>

            <div class="field">
                <div class="file has-name is-boxed">
                  <label class="file-label">
                    <input class="file-input" type="file" name="photo" id="file" accept="image/*" required>
                    <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">
                        Choose a file…
                      </span>
                    </span>
                    <span class="file-name" id="filename"></span>
                  </label>
                </div>
            </div>

            <div class="field">
                <div class="g-recaptcha" data-sitekey="6LdoZ1MUAAAAABeYf0tbVhAAGYSmvTnPjXXFJm0y"></div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection