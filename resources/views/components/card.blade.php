@props(['title', 'desc', 'link', 'color'])

<div class="card action-card" style="background: {{ $color }}; color:white;">
  <h3>{{ $title }}</h3>
  <p>{{ $desc }}</p>
  <a href="{{ $link }}" class="action-btn">Go</a>
</div>
</div>

  </div>

 