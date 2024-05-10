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
            overflow: hidden;
            /* Ensure the preview image stays within the video item */
        }

        .video-item video {
            width: 100%;
            height: 80%;
        }

        .preview-image {
            width: 100%;
            height: auto;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.7;
            /* Adjust opacity to your preference */
        }

        .video-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            z-index: 1;
            /* Ensure the info appears on top of the preview image */
        }

        .play-button {
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
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

                        // Create preview image
                        const previewImage = document.createElement('img');
                        previewImage.classList.add('preview-image');
                        previewImage.src = video.preview_image_path;
                        videoItem.appendChild(previewImage);

                        // Create video element
                        const vid = document.createElement('video');
                        vid.controls = false;
                        const source = document.createElement('source');
                        source.src = video.path;
                        source.type = 'video/mp4';
                        vid.appendChild(source);
                        videoItem.appendChild(vid);

                        // Create play button
                        const playButton = document.createElement('button');
                        playButton.classList.add('play-button');
                        playButton.textContent = 'Play';
                        playButton.addEventListener('click', function() {
                            vid.play();
                        });
                        videoItem.appendChild(playButton);

                        // Create video info
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
