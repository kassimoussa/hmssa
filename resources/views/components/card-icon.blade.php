<div class="col p-2">
    <div class="card border-primary no-radius text-center bg-white">
        <div class="card-body">
            <span class="fa-stack fa-2x">
                <i class="fas fa-square fa-stack-2x icnbgc"></i>
                <i class="fa-solid  {{ $icon }} fa-stack-1x icnc"></i>
            </span>
            <h2 class="card-title">{{ $title }}</h2>

            <p class="cl-effect-1">
                <a href="{{ url($url) }}">
                   {{ $text }}
                </a>
            </p>
        </div>
    </div>
</div>
