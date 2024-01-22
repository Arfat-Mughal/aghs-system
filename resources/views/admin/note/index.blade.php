@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Note</h2>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal"
                                    data-target="#createNoteModal">
                                    <i class="zmdi zmdi-plus"></i> Create Note
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        @if ($errors->has('errors'))
                            <div class="alert alert-danger">
                                {{ $errors->first('errors') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <th scope="row">{{ $note->id }}</th>
                                    <td>{{ $note->name }}</td>
                                    <td>{!! $note->description !!}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('notes.view', $note->id) }}" target="_black"
                                            class="btn btn-danger">
                                            PRINT
                                        </a>
                                        <form method="post" action="{{ route('notes.destroy', $note) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn ml-2 btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Note Modal -->
    <div class="modal fade" id="createNoteModal" tabindex="-1" role="dialog" aria-labelledby="createNoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNoteModalLabel">Create Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Include your create note form here -->
                    <form method="post" action="{{ route('notes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Your form fields go here -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Upload Image:</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Include CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- Initialize CKEditor for the description field -->
    <script>
        CKEDITOR.replace('description', {
            toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                }
            ],
            removeButtons: 'Styles,Source,Save,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,BidiLtr,BidiRtl,Language,Flash,Table,HorizontalRule,Smiley,PageBreak,Iframe,ShowBlocks,About'
        });
    </script>
@endsection
