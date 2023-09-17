@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="import_file">Ürün CSV Dosyası Seçin:</label>
                                <input type="file" class="form-control" id="import_file" name="import_file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">İçeri Aktar</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
