<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ assert('CSS/main.css') }}">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-success">Company List</h2>
            </div>
            <div >
                <a href="{{route('companies.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Create Company</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th width="8px" class="bg-secondary text-white">No.</th>
                    <th class="bg-secondary text-white text-center">Company Name</th>
                    <th class="bg-secondary text-white text-center">Company Email</th>
                    <th class="bg-secondary text-white text-center">Company Address</th>
                    <th width="150px" class="bg-secondary text-white text-center">Action</th>
                </tr>
                @foreach($companies as $company)
                    <tr>
                        <td class="text-center">{{ $company->id }}</td>
                        <td class="text-center">{{ $company->name }}</td>
                        <td class="text-center">{{ $company->email }}</td>
                        <td class="text-center">{{ $company->address }}</td>
                        <td>
                            <form action="{{route('companies.destroy', $company->id)}}" method="POST" class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('companies.edit', $company->id)}}" class="btn btn-info"><i class="fa fa-refresh"></i>Edit</a>
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger"><i class="bi bi-trash text-light"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach   
            </table>
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</body>
</html>