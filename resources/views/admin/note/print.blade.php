<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Overlay with Text</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .image-container {
            position: relative;
            display: inline-block;
            page-break-before: always; /* Ensure each image starts on a new page when printing */
        }

        .image-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
            padding: 10px 20px;
            text-align: center;
            border-radius: 10px;
        }

        .header {
            font-size: 30px;
        }

    </style>
</head>
<body>
    <div class="image-container">
        <img src="{{ asset('storage/' . $note->path) }}" alt="image">
        <div class="overlay">
            <p class="header">{{$note->name}}</p>
            <p class="description">{!! $note->description !!}</p>
        </div>
    </div>
</body>
</html>
