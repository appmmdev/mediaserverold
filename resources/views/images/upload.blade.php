<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Image Upload</title>
</head>
<body>
    <h1>Multi-Image Upload</h1>
    <form id="uploadForm" action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" id="imageInput" accept="image/*" multiple>
        <button type="button" id="uploadButton">Upload</button>
    </form>
    <div id="status"></div>
    <div id="progressBarContainer" style="display: none;">
        <div id="progressBar"></div>
        <div id="progressInfo"></div>
    </div>

    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            var form = document.getElementById('uploadForm');
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("upload") }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.upload.onprogress = function(event) {
                var percent = Math.round((event.loaded / event.total) * 100);
                var progressBar = document.getElementById('progressBar');
                progressBar.style.width = percent + '%';
                var progressInfo = document.getElementById('progressInfo');
                progressInfo.textContent = percent + '% uploaded';
            };
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    var statusElement = document.getElementById('status');
                    if (xhr.status === 201) {
                        // Success
                        statusElement.textContent = 'Images uploaded successfully';
                    } else {
                        // Error
                        statusElement.textContent = 'Error uploading images. Please try again.';
                    }
                    document.getElementById('progressBarContainer').style.display = 'none';
                }
            };
            document.getElementById('progressBarContainer').style.display = 'block';
            xhr.send(formData);
        });
    </script>
</body>
</html>
