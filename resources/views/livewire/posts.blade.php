<div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('dlmessage'))
        <div class="alert alert-danger" role="alert">
            {{ session('dlmessage') }}
        </div>
    @endif

    @if ($editvalue)
        @include('livewire.edit')
    @else
        @include('livewire.create')
    @endif

    <h1 class="text-primary mt-5">page list</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postlist as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->message }}</td>
                    <td>
                        <button wire:click='edit({{ $post->id }})' class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click='delete({{ $post->id }})' class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
