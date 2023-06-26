<div class="container-fluid">
    <form method="POST" action="{{ route('task.create') }}">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="titel" class="form-control" placeholder="Titel">
            </div>
            <div class="col">
                <input type="text" name="beschrijving" class="form-control" placeholder="Beschrijving">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Voeg taak toe</button>
    </form>
    <hr>
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>Titel</th>
            <th>Beschrijving</th>
        </tr>
        <tbody>+
        @if($tasks->count() > 0)
            @foreach($tasks as $rs)
                <tr>
                    <td class="align-middle">{{ $rs->titel }}</td>
                    <td class="align-middle">{{ $rs->description }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('task.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('task.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('task.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Task not found</td>
            </tr>
        @endif
        </tbody>
        </thead>
    </table>
</div>
