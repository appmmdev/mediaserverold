<!-- resources/views/image_gallery.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 10px;
        }

        .image-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Image Gallery</h1>
    <div class="image-grid" id="imageGrid"></div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('get.images') }}')
                .then(response => response.json())
                .then(data => {
                    const imageGrid = document.getElementById('imageGrid');
                    data.forEach(image => {
                        const imageItem = document.createElement('div');
                        imageItem.classList.add('image-item');
                        const img = document.createElement('img');
                        img.src = image.path;
                        imageItem.appendChild(img);
                        imageGrid.appendChild(imageItem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching images:', error);
                });
        });
    </script>
</body>

</html>
