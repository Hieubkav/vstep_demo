@props([
    'videoId',
    'title' => 'Video',
    'autoplay' => true,
    'mute' => true,
    'loop' => true,
    'controls' => false,
    'start' => 0,
    'end' => null,
    'class' => '',
    'containerClass' => '',
    'loadingClass' => 'bg-gradient-to-br from-gray-900 via-black to-gray-800'
])

@php
$params = [
    'autoplay' => $autoplay ? 1 : 0,
    'mute' => $mute ? 1 : 0,
    'loop' => $loop ? 1 : 0,
    'controls' => $controls ? 1 : 0,
    'modestbranding' => 1,
    'rel' => 0,
    'showinfo' => 0,
    'iv_load_policy' => 3,
    'disablekb' => 1,
    'fs' => 0,
    'cc_load_policy' => 0,
    'playsinline' => 1,
    'enablejsapi' => 1, // Enable JavaScript API for loop control
];

if ($start > 0) {
    $params['start'] = $start;
}

if ($end) {
    $params['end'] = $end;
    // Add playlist parameter for proper looping with end time
    $params['playlist'] = $videoId;
}

$queryString = http_build_query($params);
$embedUrl = "https://www.youtube.com/embed/{$videoId}?{$queryString}";
$uniqueId = 'hero-video-' . uniqid();
@endphp

<div class="{{ $containerClass }}">
    {{-- Load video immediately for hero section --}}
    <iframe
        id="{{ $uniqueId }}"
        src="{{ $embedUrl }}"
        title="{{ $title }}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
        class="{{ $class }}"
        style="pointer-events: none;"
    ></iframe>
</div>

@if($loop && $end)
{{-- JavaScript để handle loop khi có end time --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // YouTube API để handle loop với end time
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    window.onYouTubeIframeAPIReady = function() {
        var player = new YT.Player('{{ $uniqueId }}', {
            events: {
                'onStateChange': function(event) {
                    // Khi video kết thúc, play lại từ đầu
                    if (event.data === YT.PlayerState.ENDED) {
                        player.seekTo({{ $start }});
                        player.playVideo();
                    }
                }
            }
        });
    };
});
</script>
@endif
