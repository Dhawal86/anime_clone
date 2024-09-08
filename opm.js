function change(episodeNumber) {
    var video = document.getElementById('videoPlayer');
    switch (episodeNumber) {
      case 1:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E01.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 2:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E02.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 3:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E03.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 4:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E04.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 5:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E05.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 6:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E06.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 7:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E07.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 8:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E08.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 9:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E09.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;
        case 10:
        video.src = 'Moviesnation.dev-One.Punch.Man.S01E10.720p.BluRay.Hindi.English.x264.ESub.mkv';
        break;

      
    }
    video.load(); // Reload the video player with the new source
  }