<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Short URL</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Laravel 10 URL Shortener</title>

    <!-- Styles -->


</head>
<body>
<div class="container my-5">
    <div class="row">
        <h1 class="my-2 fs-4 fw-bold text-center">Laravel URL Shortener</h1>
        <form action="{{ route('url.shorten') }}" method="POST" class="my-2">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="url" class="form-control" placeholder="URL Shortener">
                <button class="btn btn-outline-secondary" type="submit">Shorten</button>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">URL Key</th>
                <th scope="col">URL Destination</th>
                <th scope="col">Short URL</th>
                <th scope="col">Visitors</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($urls as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->url_key }}</td>
                    <td>{{ $item->destination_url }}</td>
                    <td>{{ $item->default_short_url }}</td>
                    <td>{{ $item->visits->count() }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}">
                            Edit
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="key" class="form-label">URL Key</label>
                                        <input type="text" name="url" value="{{ $item->url_key }}" class="form-control" id="key">
                                    </div>
                                    <div class="mb-3">
                                        <label for="destination" class="form-label">Destination URL</label>
                                        <input type="text" name="destination" value="{{ $item->destination_url }}" class="form-control" id="destination">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
