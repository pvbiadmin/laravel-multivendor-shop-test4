@extends ( 'admin.layouts.master' )

@section ( 'content' )
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Footer</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Footer Social</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.footer-socials.update', $footer->id) }}" method="POST">
                                @csrf
                                @method ( 'PUT' )
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <div>
                                        <button class="btn btn-primary" data-icon="{{ $footer->icon }}"
                                                data-selected-class="btn-danger" data-unselected-class="btn-info"
                                                role="iconpicker" id="icon" name="icon"></button>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name"
                                           id="name" value="{{ $footer->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="url">url</label>
                                    <input type="text" class="form-control" name="url"
                                           id="url" value="{{ $footer->url }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $footer->status === 1 ? 'selected': '' }} value="1">Active</option>
                                        <option {{ $footer->status === 0 ? 'selected': '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection