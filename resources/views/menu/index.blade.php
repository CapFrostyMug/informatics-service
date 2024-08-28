<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('lead.create') ? 'text-decoration-underline active' : '' }}"
       href="{{ route('lead.create') }}">Добавить лида</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('lists-and-statistics.index') ? 'text-decoration-underline active' : '' }}"
       href="{{ route('lists-and-statistics.index') }}">Списки и статистика</a>
</li>
