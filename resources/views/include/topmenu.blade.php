<ul class="navbar-nav">
@foreach ($items as $item)
        <li class="nav-item ">
            <a class="nav-link" href="{{ url($item->link()) }}">
               {{ $item->title }}
            </a>
        </li>
@endforeach
</ul>
