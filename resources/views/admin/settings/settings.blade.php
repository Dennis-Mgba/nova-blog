@extends('layouts.app')

@section('content')
        @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Blog Settings
        </div>

        <div class="panel-body">
            <form class="" action="{{ route('settings.update') }}" method="post">
                {{ csrf_field() }}
                <!--create input fields based on the columns define in the settings migration table-->
                <div class="form-group">
                    <label for="contact name">Site Name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact number">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact email">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit"  class="btn btn-success">
                            Update site settings
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
