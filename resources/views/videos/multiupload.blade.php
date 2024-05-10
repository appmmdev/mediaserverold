<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Video Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Multi-Video Upload</h1>

    <form id="uploadForm" enctype="multipart/form-data">
        @csrf

        <input id="videoInput" type="file" name="videos[]" multiple accept="video/mp4">
        <button id="uploadButton" type="submit">Upload Videos</button>
        <button id="cancelButton" type="button">Cancel</button>
    </form>

    <div id="progressContainer" style="display: none;">
        <progress id="progressBar" value="0" max="100"></progress>
        <span id="progressPercentage">0%</span>
        <span id="uploadSpeed">0 KB/s</span>
    </div>

    <script>
        $(document).ready(function() {
            $("#uploadButton").click(function(e) {
                e.preventDefault();
                var formData = new FormData($('#uploadForm')[0]);
                uploadVideos(formData);
            });

            $("#cancelButton").click(function() {
                // Implement cancel logic
            });

            function uploadVideos(formData) {
                $("#progressContainer").show();
                $.ajax({
                    url: "{{ route('videos.multiupload') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round((evt.loaded / evt.total) *
                                    100);
                                $("#progressBar").val(percentComplete);
                                $("#progressPercentage").text(percentComplete + '%');

                                // Calculate upload speed
                                // var uploadSpeed = calculateUploadSpeed(evt.loaded, evt.timeStamp);
                                // $("#uploadSpeed").text(uploadSpeed + ' KB/s');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        // Handle success, e.g., refresh page
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function calculateUploadSpeed(loaded, timeStamp) {
                // Calculate upload speed (KB/s)
                // var speed = (loaded / ((Date.now() - timeStamp) / 1000)).toFixed(2);
                // return speed;
            }
        });
    </script>
</body>

</html>
