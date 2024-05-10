<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Gallery</title>
    <style>
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 10px;
        }

        .video-item {
            position: relative;
        }

        .video-item video {
            width: 100%;
            height: 80%;
        }

        .video-info {
            position: absolute;

            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 0px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h1>Video Gallery</h1>
    <div class="video-grid" id="videoGrid"></div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('get.videos') }}')
                .then(response => response.json())
                .then(data => {
                    const videoGrid = document.getElementById('videoGrid');
                    data.forEach(video => {
                        const videoItem = document.createElement('div');
                        videoItem.classList.add('video-item');
                        const vid = document.createElement('video');
                        vid.controls = true;
                        const source = document.createElement('source');
                        source.src = video.path;
                        source.type = 'video/mp4';
                        vid.appendChild(source);
                        videoItem.appendChild(vid);

                        const videoInfo = document.createElement('div');
                        videoInfo.classList.add('video-info');
                        const name = document.createElement('p');
                        name.textContent = video.name;
                        const uploadedTime = document.createElement('p');
                        uploadedTime.textContent = 'Uploaded: ' + video.created_at;
                        videoInfo.appendChild(name);
                        videoInfo.appendChild(uploadedTime);
                        videoItem.appendChild(videoInfo);

                        videoGrid.appendChild(videoItem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching videos:', error);
                });
        });
    </script>
</body>

</html>
