<div>
    <div class="container">
        <h1>LiveWire CRUD</h1>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input wire:model="title" type="text" class="form-control" id="title">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Enter Message</label>
                <textarea wire:model="message" class="form-control" id="message" rows="3"></textarea>
                @error('message')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button wire:click.prevent="update()" type="submit" class="btn btn-success">Submit</button>
            <button wire:click.prevent="cancelupdate()" type="submit" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
